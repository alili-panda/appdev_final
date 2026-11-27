<?php

namespace App\Http\Controllers\socialWorker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class myCasesController extends Controller
{
     public function index(Request $request)
    {

          $cases = DB::table('vawc_intakes as i')
            ->leftJoin('vawc_victim_survivors as v', 'v.vawc_intake_id', '=', 'i.id')
            ->where('i.created_by', $request->user()->id)
            ->select('i.id', 'i.case_number', 'i.referred_admitted_date', 'v.given_name', 'v.last_name')
            ->orderByDesc('i.id')->paginate(10);



        return view('social-worker.cases.index', compact('cases'));
    }


     public function create()
    {
        return view('social-worker.cases.create');
    }

    public function store(Request $request)
    {
        $rules = ['family' => ['nullable', 'array', 'max:10'], 'family.*' => ['array']];
        $fields = collect(config('vawc.sections'))->flatten(1)->all();
        foreach ($fields as $field) {
            $rules[$field['name']] = $this->fieldRules($field);
        }
        $rules['case_number'][] = Rule::unique('vawc_intakes', 'case_number');
        foreach (config('vawc.family_fields') as $field) {
            $rules['family.*.' . $field['name']] = $this->fieldRules($field);
        }
        $validator = validator($request->all(), $rules);
        $validator->after(function ($validator) use ($request) {
            foreach ((array) $request->input('family', []) as $index => $member) {
                if (!is_array($member)) { continue; }
                $hasData = collect($member)->contains(fn ($value) => $value !== null && $value !== '');
                if ($hasData && trim((string) ($member['name'] ?? '')) === '') {
                    $validator->errors()->add("family.$index.name", 'Enter a name for each completed family member.');
                }
            }
        });
        $data = $validator->validate();
        $paths = [];
        try {
            foreach ($fields as $field) {
                if ($field['type'] === 'file' && $request->hasFile($field['name'])) {
                    $path = $request->file($field['name'])->store('vawc/signatures', 'local');
                    if (!$path) { throw new \RuntimeException('Signature upload failed.'); }
                    $paths[] = $path;
                    $data[$field['name']] = $path;
                }
            }
            DB::transaction(function () use ($data, $fields, $request) {
                $now = now();
                $intakeKeys = collect($fields)->pluck('name')->filter(fn ($name) => !str_contains($name, '.'))->all();
                $intake = Arr::only($data, $intakeKeys);
                foreach ($fields as $field) {
                    if ($field['type'] === 'checkbox') {
                        $intake[$field['name']] = (bool) ($data[$field['name']] ?? false);
                    }
                }
                $id = DB::table('vawc_intakes')->insertGetId(array_merge($intake, [
                    'created_by' => $request->user()->id, 'created_at' => $now, 'updated_at' => $now,
                ]));
                foreach (['victim' => 'vawc_victim_survivors', 'perpetrator' => 'vawc_perpetrators'] as $group => $table) {
                    $keys = collect($fields)->pluck('name')->filter(fn ($name) => str_starts_with($name, "$group."))
                        ->map(fn ($name) => substr($name, strlen($group) + 1))->all();
                    $record = Arr::only($data[$group] ?? [], $keys);
                    if ($group === 'perpetrator' && !collect($record)->contains(fn ($value) => $value !== null && $value !== '')) { continue; }
                    DB::table($table)->insert(array_merge($record, ['vawc_intake_id' => $id, 'created_at' => $now, 'updated_at' => $now]));
                }
                foreach ($data['family'] ?? [] as $index => $member) {
                    $member = Arr::only($member, array_column(config('vawc.family_fields'), 'name'));
                    if (!collect($member)->contains(fn ($value) => $value !== null && $value !== '')) { continue; }
                    DB::table('vawc_family_members')->insert(array_merge($member, [
                        'vawc_intake_id' => $id, 'position' => $index + 1, 'created_at' => $now, 'updated_at' => $now,
                    ]));
                }
            });
        } catch (\Throwable $exception) {
            Storage::disk('local')->delete($paths);
            throw $exception;
        }
        return redirect()->route('social-worker.cases.index')->with('success', 'Case created successfully.');
    }

    private function fieldRules(array $field): array
    {
        $type = $field['type'];
        $rules = [$field['required'] ? 'required' : 'nullable'];
        if ($type === 'checkbox') { return ['sometimes', 'boolean']; }
        if ($type === 'file') { return ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048']; }
        if ($type === 'date') { return array_merge($rules, ['date_format:Y-m-d']); }
        if ($type === 'age') { return array_merge($rules, ['integer', 'min:0', 'max:130']); }
        if ($type === 'money') { return array_merge($rules, ['numeric', 'min:0', 'max:9999999999.99', 'decimal:0,2']); }
        if (str_starts_with($type, 'select:')) {
            $values = array_map(fn ($option) => explode('=', $option, 2)[0], explode('|', substr($type, 7)));
            return array_merge($rules, [Rule::in($values)]);
        }
        $max = $type === 'textarea' ? 50000 : (in_array($type, ['short', 'tel']) ? 50 : ($field['name'] === 'case_number' ? 100 : 255));
        if (in_array($field['name'], ['victim.gender', 'victim.civil_status', 'perpetrator.civil_status'], true)) { $max = 100; }
        return array_merge($rules, ['string', "max:$max"]);
    }
}
