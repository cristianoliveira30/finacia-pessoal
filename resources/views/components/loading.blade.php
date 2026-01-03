@props([
    // sm | md | lg
    'size' => 'sm',
])

@php
    $sizes = [
        'sm' => ['outer' => 'w-5 h-5 border-2', 'inner' => 'w-3.5 h-3.5 border-2'],
        'md' => ['outer' => 'w-7 h-7 border-[3px]', 'inner' => 'w-5 h-5 border-[3px]'],
        'lg' => ['outer' => 'w-9 h-9 border-4', 'inner' => 'w-7 h-7 border-4'],
    ];

    $s = $sizes[$size] ?? $sizes['sm'];
@endphp

<!-- From Uiverse.io by devAaus -->
<span class="inline-flex items-center justify-center leading-none">
    <span class="{{ $s['outer'] }} border-transparent animate-spin inline-flex items-center justify-center rounded-full border-t-blue-400">
        <span class="{{ $s['inner'] }} border-transparent animate-spin inline-flex items-center justify-center rounded-full border-t-red-400"></span>
    </span>
</span>
