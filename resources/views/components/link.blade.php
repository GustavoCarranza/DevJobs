@php
    $classes = "text-sm text-gray-600 hover:text-gray-900 font-bold"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>