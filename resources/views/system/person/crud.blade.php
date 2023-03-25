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

                        <x-custom.text-input
                            label="Cidade"
                            id="input-city"
                            name="address[city]"
                            errorName="address.city"
                            :value="old('address.city') ?? $person->address->city ?? null"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Estado"
                            id="input-state"
                            name="address[state]"
                            errorName="address.state"
                            :value="old('address.state') ?? $person->address->state ?? null"
                            :required="true"
                            :errors="$errors"/>

                        <x-custom.text-input
                            label="Número"
                            id="input-number"
                            name="address[number]"
                            errorName="address.number"
                            :value="old('address.number') ?? $person->address->number ?? null"
                            :errors="$errors"/>

                        <x-custom.submit-button style="display: block"/>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
