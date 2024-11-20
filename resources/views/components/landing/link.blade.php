@props(['ruta', 'texto', 'clase' => '', 'target' => '_self'])

@php
    // Verifica si la ruta actual es '/posts' y asigna 'activo' al link de la ruta 'blog'
    $isActive = (request()->is('posts') && $ruta === 'blog') || request()->routeIs($ruta);
@endphp

<a href="{{ route($ruta) }}" wire:navigate.hover
   class="{{ $clase }} {{ $isActive ? 'activo' : '' }}"
   target="{{ $target }}">
    {{ $texto }}
</a>
