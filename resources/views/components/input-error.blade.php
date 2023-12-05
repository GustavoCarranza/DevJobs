@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => ' bg-red-300 p-3 border-red-700 border-l-4 text-white font-bold text-sm text-red-600 dark:text-red-400 space-y-2']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
