@props([
    'disabled' => false,
    'disableIfEmpty' => false,
    'required' => false,
    'ariaRequired' => true,
    'errors',
    'label',
    'id',
    'name',
    'errorName' => $name,
    'currentSelected',
    'defaultPlaceholder' => 'Selecione uma opção',
    'apiUrl',
    'apiValue',
    'apiText' => 'name',
    'apiReplaces',
    'enablesElementOnSelect',
    'reloadOnElementChange'
])

@isset ($label)
    @component('components.custom.input-label', [
        'value' => $label,
        'for' => $id
    ]) @endcomponent
@endif

<!--suppress HtmlFormInputWithoutLabel -->
<select
    {{ $disabled ? 'disabled' : '' }}
    {{ $required ? 'required' : ''}}
    {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}
    id="{{ $id }}"
    name="{{ $name }}"
    aria-required="{{ $ariaRequired ? 'true' : 'false' }}"
    style="margin-bottom: 10px"
>
    @isset($currentSelected)
        <option value="{{ $currentSelected['value'] ?? '' }}" selected>
            {{$currentSelected['text'] ?? ''}}
        </option>
    @endisset
</select>

@if (isset($errors) && $errors->has($errorName))
    @component('components.input-error', [
        'messages' => $errors->first($errorName)
    ]) @endcomponent
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const select = $("#{{ $id }}");
        const currentSelectedValue = "{{ $currentSelected['value'] ?? '' }}";
        const replaces = {!! isset($apiReplaces) ? json_encode($apiReplaces) : 'null' !!};
        const url = "{{ $apiUrl }}";

        const generate = (select, currentSelectedValue, replaces, url) => {
            // Clear select
            select.empty();

            // Replace url if needed
            if (replaces) {
                Object.keys(replaces).forEach((key) => {
                    const replace = replaces[key];
                    const element = $(`#${replace['id']}`);
                    let value = element.val() ?? '';

                    if (value.length === 0) {
                        let selected = element.find(':selected');
                        value = selected.val() ?? '';

                        if (value.length === 0) {
                            value = replace['default'] ?? '';
                        }
                    }

                    url = url.replace(`{${key}}`, value);
                });
            }

            const placeholderId = "{{ $id }}-placeholder";
            select.append(`<option id="${placeholderId}" value="" selected>{{ $defaultPlaceholder }}</option>`);

            // Fill select with options
            $.getJSON(url, (resposta) => {
                resposta.forEach((item) => {
                    let value = item.{{ $apiValue }} ?? '';
                    let text = item.{{ $apiText }} ?? value;
                    let isSelected = value === currentSelectedValue;

                    if (isSelected) {
                        $(`#${placeholderId}`).remove();
                    }

                    select.append(`<option value="${value}" ${isSelected ? 'selected' : ''}>${text}</option>`);
                });
            });
        }

        @if ($disableIfEmpty)
            if (currentSelectedValue.length === 0) {
                select.attr('disabled', true);
            }
        @endif

        @isset($enablesElementOnSelect)
            // Enable other elements if needed
            const enables = {!! json_encode($enablesElementOnSelect) !!};

            select.change(function () {
                const value = $(this).val();

                enables.forEach((id) => {
                    const enableElement = $(`#${id}`);
                    enableElement.attr('disabled', value === '');
                });
            });
        @endisset

        @isset($reloadOnElementChange)
            // Reload this element if other element changes
            const changes = {!! json_encode($reloadOnElementChange) !!};

            changes.forEach((id) => {
                const enableElement = $(`#${id}`);
                enableElement.on('change', function () {
                    generate(select, currentSelectedValue, replaces, url);
                });
            });
        @endisset

         // Trigger events when select is enabled/disabled
         $.propHooks.disabled = {
             set: function (el, value) {
                 if (el.disabled !== value) {
                     el.disabled = value;
                     value && $(el).trigger('disabledSet');
                     !value && $(el).trigger('enabledSet');
                 }
             }
         };

        if (select.not(':disabled')) {
            generate(select, currentSelectedValue, replaces, url);
        }

        select.on('enableSet', function () {
            generate(select, currentSelectedValue, replaces, url);
        });
    }, false);
</script>
