{{-- resources/views/components/nav-link.blade.php --}}
@props(['href'])

@php
    // Determine if the current route is the active route
    $isActive = request()->is('/') && $href === route('home') || request()->is(trim(parse_url($href, PHP_URL_PATH), '/'));
@endphp

<div class="flex items-center">
    <a class="font-sans {{ $isActive ? 'text-cyan-dark font-semibold' : 'text-white' }} hover:text-cyan m-2" href="{{ $href }}">
        {{ $slot }}
    </a>
</div>
