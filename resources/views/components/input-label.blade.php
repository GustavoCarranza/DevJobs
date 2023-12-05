@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm text-gray-500 font-bold uppercase']) }}>
    {{ $value ?? $slot }}
</label>
