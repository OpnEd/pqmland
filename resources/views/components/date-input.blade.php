<div>
    <input
        type="date"
        id="{{ $id }}"
        name="{{ $name }}"
        value="{{ $value }}"
        @if($required) required @endif
        @if($min) min="{{ $min }}" @endif
        @if($max) max="{{ $max }}" @endif
        {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
    >
</div>
