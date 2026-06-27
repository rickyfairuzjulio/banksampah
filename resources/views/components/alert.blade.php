<!-- Alert/Status Message Component -->
<div class="rounded-lg p-4 border {{ 
    match($type ?? 'info') {
        'success' => 'bg-green-50 border-green-200 text-green-800',
        'error' => 'bg-red-50 border-red-200 text-red-800',
        'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800',
        'info' => 'bg-blue-50 border-blue-200 text-blue-800',
        default => 'bg-gray-50 border-gray-200 text-gray-800'
    }
}}">
    <div class="flex">
        <div class="flex-shrink-0">
            <span class="text-xl">
                {{ match($type ?? 'info') {
                    'success' => '✓',
                    'error' => '✕',
                    'warning' => '⚠',
                    'info' => 'ℹ',
                    default => '●'
                }}}
            </span>
        </div>
        <div class="ml-3 flex-1">
            @if($title ?? null)
                <h3 class="font-semibold mb-1">{{ $title }}</h3>
            @endif
            <div class="text-sm">
                {{ $slot }}
            </div>
        </div>
        @if($dismissible ?? false)
            <button type="button" class="ml-auto text-lg leading-none opacity-70 hover:opacity-100" onclick="this.parentElement.remove()">
                ×
            </button>
        @endif
    </div>
</div>
