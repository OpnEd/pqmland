<a href="{{ route($ruta) }}" wire:navigate.hover
   class="{{ $clase }} {{ $activo ? 'activo' : '' }}"
   target="{{ $target }}">
    {{ $texto }}
</a>
