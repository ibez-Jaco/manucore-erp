@props(['active' => false])
<a {{ $attributes->merge(['class' => '_navlink '.($active ? '-active' : '')]) }}>
    {{ $slot }}
</a>
