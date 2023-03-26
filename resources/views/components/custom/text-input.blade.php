@props([
    'disabled' => false,
    'required' => false,
    'ariaRequired' => true,
    'type' => 'text',
    'value' => '',
    'errors',
    'label',
    'id',
    'name',
    'errorName' => $name
])

@isset ($label)
    @component('components.custom.input-label', [
        'value' => $label,
        'for' => $id
    ]) @endcomponent
@endif

<!--suppress HtmlFormInputWithoutLabel -->
<input
    {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : ''}}
    {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}
    id="{{ $id }}"
    name="{{ $name }}"
    type="{{ $type }}"
    aria-required="{{ $ariaRequired ? 'true' : 'false' }}"
    value="{{ $value }}"
    style="margin-bottom: 10px"
>

@if (isset($errors) && $errors->has($errorName))
    @component('components.input-error', [
        'messages' => $errors->first($errorName)
    ]) @endcomponent
@endif
