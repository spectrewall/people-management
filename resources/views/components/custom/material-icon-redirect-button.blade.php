@props([
    'color' => 'white',
    'title',
    'icon',
    'href'
])

<a href="{{ $href }}">
    <button
        type="button"
        @isset($title) title="{{ $title }}" @endisset>
        <i class="material-symbols-outlined" style="color: {{ $color }}">{{ $icon }}</i>
    </button>
</a>
