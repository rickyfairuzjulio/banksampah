<!-- Form Input Component -->
<div class="mb-4">
    @if($label ?? null)
        <label for="{{ $name ?? '' }}" class="block text-sm font-medium text-gray-700 mb-1.5">
            {{ $label }}
            @if($required ?? false)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    @if($type === 'textarea')
        <textarea 
            name="{{ $name ?? '' }}"
            id="{{ $name ?? '' }}"
            rows="{{ $rows ?? 4 }}"
            {{ $attributes->merge(['class' => 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition']) }}
            {{ $required ?? false ? 'required' : '' }}
        >{{ $value ?? old($name ?? '') }}</textarea>
    @elseif($type === 'select')
        <select 
            name="{{ $name ?? '' }}"
            id="{{ $name ?? '' }}"
            {{ $attributes->merge(['class' => 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition']) }}
            {{ $required ?? false ? 'required' : '' }}
        >
            <option value="">{{ $placeholder ?? 'Pilih...' }}</option>
            @foreach($options ?? [] as $val => $label)
                <option value="{{ $val }}" @selected($value ?? old($name ?? '') == $val)>{{ $label }}</option>
            @endforeach
        </select>
    @else
        <input 
            type="{{ $type ?? 'text' }}"
            name="{{ $name ?? '' }}"
            id="{{ $name ?? '' }}"
            placeholder="{{ $placeholder ?? '' }}"
            value="{{ $value ?? old($name ?? '') }}"
            {{ $attributes->merge(['class' => 'w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition']) }}
            {{ $required ?? false ? 'required' : '' }}
        />
    @endif

    @error($name ?? '')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror

    @if($hint ?? null)
        <p class="text-gray-500 text-xs mt-1">{{ $hint }}</p>
    @endif
</div>
