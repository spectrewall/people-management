@props([
    'color' => 'white',
    'icon',
    'href'
])

<a href="{{ $href }}">
    <button type="button" title="Editar">
        <i class="material-symbols-outlined" style="color: {{ $color }}">{{ $icon }}</i>
    </button>
</a>
