@props([
    'color' => 'white',
    'method' => 'get',
    'enctype' => 'multipart/form-data',
    'id',
    'href',
    'icon',
    'title',
])

<form
    method="POST"
    style="display: none"
    id="{{ $id }}"
    enctype="{{ $enctype }}"
    action="{{ $href }}">

    @csrf
    @method($method)
</form>

<button
    type="submit"
    form="{{ $id }}"
    @isset($title) title="{{ $title }}" @endisset>
    <i class="material-symbols-outlined" style="color: {{ $color }}">{{ $icon }}</i>
</button>
