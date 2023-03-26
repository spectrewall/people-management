<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $titleVerb }} Pessoa
        </h2>
    </x-slot>

    <x-custom.alerts />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ $formAction }}">
                        @csrf

                        @isset($person)
                            @method('PUT')
                        @endisset

                        <x-custom.text-input
                            label="Nome"
                            id="input-name"
                            name="name"
                            :value="old('name') ?? $person->name ?? null"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="CPF"
                            id="input-cpf"
                            name="cpf"
                            :value="old('cpf') ?? $person->cpf ?? null"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="E-mail"
                            id="input-email"
                            name="email"
                            type="email"
                            :value="old('email') ?? $person->email ?? null"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Celular"
                            id="input-phone"
                            name="phone"
                            :value="old('phone') ?? $person->phone ?? null"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Data de Nascimento"
                            id="input-birth-date"
                            name="birth_date"
                            type="date"
                            :value="old('birth_date') ?? $person->birth_date ?? null"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Rua"
                            id="input-street"
                            name="address[street]"
                            errorName="address.street"
                            :value="old('address.street') ?? $person->address->street ?? null"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.selector-input-from-api
                            label="Estado"
                            id="input-state"
                            name="address[state]"
                            errorName="address.state"
                            :required="true"
                            :errors="$errors"
                            defaultPlaceholder="Selecione um estado"
                            :currentSelected="[
                                'value' => old('address.state') ?? $person->address->state ?? null,
                                'text' => old('address.state') ?? $person->address->state ?? null
                            ]"
                            apiUrl="https://servicodados.ibge.gov.br/api/v1/localidades/estados"
                            apiValue="sigla"
                            apiText="nome"
                            :enablesElementOnSelect="['input-city']"/>

                        <x-custom.selector-input-from-api
                            :disableIfEmpty="true"
                            label="Cidade"
                            id="input-city"
                            name="address[city]"
                            errorName="address.city"
                            :required="true"
                            :errors="$errors"
                            defaultPlaceholder="Selecione uma cidade"
                            :currentSelected="[
                                'value' => old('address.city') ?? $person->address->city ?? null,
                                'text' => old('address.city') ?? $person->address->city ?? null
                            ]"
                            apiUrl="https://servicodados.ibge.gov.br/api/v1/localidades/estados/{uf}/municipios"
                            apiValue="nome"
                            apiText="nome"
                            :apiReplaces="[
                                'uf' => [
                                    'id' => 'input-state',
                                    'property' => 'value',
                                    'default' => old('address.state') ?? $person->address->state ?? null
                                ]
                            ]"
                            :reloadOnElementChange="['input-state']"/>

                        <x-custom.text-input
                            label="Número"
                            id="input-number"
                            name="address[number]"
                            errorName="address.number"
                            :value="old('address.number') ?? $person->address->number ?? null"
                            :errors="$errors"/>

                        <div style="display: block">
                            <x-custom.redirect-button :href="route('person.index')"/>
                            <x-custom.submit-button/>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                $('#input-cpf').mask('000.000.000-00', {reverse: true});
                $('#input-phone').mask('(00) 00000-0000');
            }, false);
        </script>
    </x-slot>
</x-app-layout>
