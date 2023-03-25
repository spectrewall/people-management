<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $titleVerb }} Pessoa
        </h2>
    </x-slot>

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
                            :value="isset($person) ? $person->name : old('name')"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="CPF"
                            id="input-cpf"
                            name="cpf"
                            :value="isset($person) ? $person->cpf : old('cpf')"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="E-mail"
                            id="input-email"
                            name="email"
                            type="email"
                            :value="isset($person) ? $person->email : old('email')"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Celular"
                            id="input-phone"
                            name="phone"
                            :value="isset($person) ? $person->phone : old('phone')"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Data de Nascimento"
                            id="input-birth-date"
                            name="birth_date"
                            type="date"
                            :value="isset($person) ? $person->birth_date : old('birth_date')"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Rua"
                            id="input-street"
                            name="address.street"
                            :value="isset($person) ? $person->address->street : old('address.street')"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Cidade"
                            id="input-city"
                            name="address.city"
                            :value="isset($person) ? $person->address->city : old('address.city')"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Estado"
                            id="input-state"
                            name="address.state"
                            :value="isset($person) ? $person->address->state : old('address.state')"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Número"
                            id="input-number"
                            name="address.number"
                            :value="isset($person) ? $person->address->number : old('address.number')"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.submit-button style="display: block"/>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
