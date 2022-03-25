@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-amber-400 text-base font-medium text-gray-100 bg-amber-400 focus:outline-none focus:text-gray-900 focus:bg-amber-500 focus:border-amber-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-100 hover:text-gray-700 hover:bg-amber-400 hover:border-amber-300 focus:outline-none focus:text-gray-900 focus:bg-amber-600 focus:border-amber-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
