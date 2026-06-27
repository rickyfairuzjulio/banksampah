<!-- Card Component for Info Boxes -->
<div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow border border-gray-100 overflow-hidden">
    @if($icon ?? null)
        <div class="inline-block w-12 h-12 bg-{{ $color ?? 'indigo' }}-100 rounded-lg flex items-center justify-center text-lg">
            {{ $icon }}
        </div>
    @endif
    
    <div class="p-6">
        @if($title ?? null)
            <h3 class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-2">
                {{ $title }}
            </h3>
        @endif
        
        @if($value ?? null)
            <div class="text-3xl font-bold text-gray-900">
                {{ $value }}
            </div>
        @endif
        
        @if($subtitle ?? null)
            <p class="text-sm text-gray-600 mt-2">{{ $subtitle }}</p>
        @endif

        {{ $slot }}
    </div>

    @if($footer ?? null)
        <div class="bg-gray-50 px-6 py-3 border-t border-gray-100 text-sm text-gray-600">
            {{ $footer }}
        </div>
    @endif
</div>
