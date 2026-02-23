@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#000000] text-sm font-medium leading-5 text-[#000000] focus:outline-none focus:border-[#000000] transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#000000] hover:text-[#000000] hover:border-[#000000] focus:outline-none focus:text-[#000000] focus:border-[#000000] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
