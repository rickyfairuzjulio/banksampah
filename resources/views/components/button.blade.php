<!-- Button Component -->
<button 
    type="{{ $type ?? 'button' }}"
    {{ $attributes->merge(['class' => 'px-4 py-2.5 rounded-lg font-medium transition-colors inline-flex items-center justify-center gap-2 min-h-12 min-w-12 text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 ' . match($variant ?? 'primary') {
        'primary' => 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500',
        'secondary' => 'bg-gray-200 text-gray-900 hover:bg-gray-300 focus:ring-gray-400',
        'success' => 'bg-green-600 text-white hover:bg-green-700 focus:ring-green-500',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        'outline' => 'border border-gray-300 bg-white text-gray-900 hover:bg-gray-50 focus:ring-indigo-500',
        'ghost' => 'text-indigo-600 hover:bg-indigo-50 focus:ring-indigo-500',
        default => 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-500'
    } ' . ($full ?? false ? 'w-full' : '')]) }}
>
    @if($icon ?? null)
        <span class="text-lg">{{ $icon }}</span>
    @endif
    {{ $slot }}
</button>
