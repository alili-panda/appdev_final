<fieldset class="bg-white rounded-xl border border-slate-200 p-6">
    <legend class="font-bold text-lg text-slate-800 px-2">III. Family composition of the victim-survivor</legend>
    <p class="text-sm text-slate-500 mb-4">Complete the rows you need. Leave unused rows blank.</p>
    @for($row = 0; $row < 10; $row++)
        <details class="border rounded-lg p-4 mb-3" @if($row === 0 || collect(old('family.' . $row, []))->contains(fn ($value) => $value !== null && $value !== '')) open @endif>
            <summary class="font-semibold cursor-pointer">Family member {{ $row + 1 }}</summary>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            @foreach(config('vawc.family_fields') as $familyField)
                @include('social-worker.cases.field', ['field' => array_merge($familyField, ['name' => 'family.' . $row . '.' . $familyField['name']])])
            @endforeach
            </div>
        </details>
    @endfor
</fieldset>
