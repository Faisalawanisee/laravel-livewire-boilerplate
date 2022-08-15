@props(['active', 'icon'])

@php
$classes = ($active ?? false)
    ? 'sidebar-link waves-effect waves-dark sidebar-link'
    : 'sidebar-link waves-effect waves-dark sidebar-link active';
@endphp

<li class="sidebar-item">
    <a {{ $attributes->merge(['class' => $classes]) }} aria-expanded="false">
        <i class="{{$icon}}" aria-hidden="true"></i>
        <span class="hide-menu">{{ $slot }}</span>
    </a>
</li>
