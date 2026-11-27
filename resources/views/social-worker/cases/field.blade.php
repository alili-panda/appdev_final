@php
    $key = $field['name'];
    $inputName = preg_replace('/\.([^\.]+)/', '[$1]', $key);
    $inputId = 'case-' . str_replace('.', '-', $key);
    $type = $field['type'];
    $value = old($key, $key === 'handling_social_worker_name' ? auth()->user()->name : '');
    $classes = 'w-full border border-slate-300 rounded-lg px-3 py-2 mt-1';
@endphp
<div class="{{ $type === 'textarea' ? 'md:col-span-2' : '' }}">
    @if($type === 'checkbox')
        <input type="hidden" name="{{ $inputName }}" value="0">
        <label for="{{ $inputId }}" class="flex gap-3 items-center text-sm"><input id="{{ $inputId }}" type="checkbox" name="{{ $inputName }}" value="1" @checked(old($key))>{{ $field['label'] }}</label>
    @else
        <label for="{{ $inputId }}" class="block text-sm font-medium text-slate-700">{{ $field['label'] }} @if($field['required'])<span aria-hidden="true">*</span>@endif</label>
        @if($type === 'textarea')
            <textarea id="{{ $inputId }}" name="{{ $inputName }}" rows="4" maxlength="50000" class="{{ $classes }}" @required($field['required'])>{{ $value }}</textarea>
        @elseif(str_starts_with($type, 'select:'))
            <select id="{{ $inputId }}" name="{{ $inputName }}" class="{{ $classes }}" @required($field['required'])>
                <option value="">Select an option</option>
                @foreach(explode('|', substr($type, 7)) as $option)
                    @php([$optionValue, $optionLabel] = explode('=', $option, 2))
                    <option value="{{ $optionValue }}" @selected((string) $value === $optionValue)>{{ $optionLabel }}</option>
                @endforeach
            </select>
        @elseif($type === 'file')
            <input id="{{ $inputId }}" name="{{ $inputName }}" type="file" accept="image/jpeg,image/png" class="{{ $classes }}"><p class="text-xs text-slate-500 mt-1">Optional JPG or PNG, maximum 2 MB. Stored privately.</p>
        @else
            <input id="{{ $inputId }}" name="{{ $inputName }}" type="{{ in_array($type, ['age', 'money']) ? 'number' : ($type === 'short' ? 'text' : $type) }}" value="{{ $value }}" class="{{ $classes }}" @required($field['required'])
                @if($type === 'age') min="0" max="130" step="1"
                @elseif($type === 'money') min="0" max="9999999999.99" step="0.01"
                @elseif(in_array($type, ['text', 'short', 'tel'])) maxlength="{{ in_array($type, ['short', 'tel']) ? 50 : ($key === 'case_number' ? 100 : 255) }}" @endif>
        @endif
    @endif
    @error($key)<p class="text-red-700 text-sm mt-1">{{ $message }}</p>@enderror
</div>
