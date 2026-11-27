@include('partials.header')
<div class="bg-slate-100 font-sans min-h-screen flex">
@include('partials.navSocialWorker')
<main class="flex-1 min-w-0 p-6 md:p-8">
    <div class="flex flex-wrap justify-between items-center gap-4 mb-6">
        <div><h1 class="text-2xl font-bold text-slate-800">Add VAWC Case</h1><p class="text-slate-500">General Intake Form — MSWDO Virac</p></div>
        <a href="{{ route('social-worker.cases.index') }}" class="px-4 py-2 bg-white border rounded-lg">Back to My Cases</a>
    </div>
    @if($errors->any())
        <div role="alert" class="bg-red-100 text-red-800 p-4 rounded-lg mb-6"><strong>Please correct these fields:</strong><ul class="list-disc pl-5">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul><p>Re-select any signature files before submitting again.</p></div>
    @endif
    <form action="{{ route('social-worker.cases.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @foreach(config('vawc.sections') as $sectionTitle => $fields)
            @if($loop->index === 4)
                @include('social-worker.cases.family')
            @endif
            <fieldset class="bg-white rounded-xl border border-slate-200 p-6">
                <legend class="font-bold text-lg text-slate-800 px-2">{{ $sectionTitle }}</legend>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @foreach($fields as $field)
                        @include('social-worker.cases.field', ['field' => $field])
                    @endforeach
                </div>
            </fieldset>
        @endforeach
        <div class="flex flex-wrap gap-3 pb-8"><button type="submit" class="bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">Save Case</button><a href="{{ route('social-worker.cases.index') }}" class="px-6 py-3 border rounded-lg bg-white">Cancel</a></div>
    </form>
</main>
</div>
@include('partials.footer')
