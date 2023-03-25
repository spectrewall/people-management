<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"> Pessoas </h2>
            <x-custom.redirect-button :href="route('person.create')" text="Nova Pessoa" />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table datatable">
                        <thead class=" text-primary">
                        <th> ID</th>
                        <th> Nome</th>
                        <th> CPF</th>
                        <th> Email</th>
                        <th> Ações</th>
                        </thead>
                        <tbody>
                        @isset($people)
                            @foreach($people as $person)
                                <tr>
                                    <td>{{ $person->id }}</td>
                                    <td>{{ $person->name }}</td>
                                    <td>{{ $person->cpf }}</td>
                                    <td>{{ $person->email }}</td>
                                    <td>
                                        <!-- Edit button -->
                                        <x-custom.material-icon-redirect-button
                                            :href="route('person.edit', $person->id)"
                                            icon="edit"/>

                                        <!-- Delete Button -->
                                        <button type="button" title="Excluir"
                                                data-route="{{ route('person.destroy', $person->id) }}"
                                                class="btn btn-danger">
                                            <i class="material-symbols-outlined">close</i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
