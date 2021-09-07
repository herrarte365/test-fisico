<div class="fade-in">
    
    <div class="dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a wire:click="$set('vista', 1)" class="breadcrumbs__link cursor">Grupos</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link text-cian-200">Perfil</a>
            </li>
        </ul>
    </div>

    <div class="dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg my-2 mb-5">
        <div class="dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="dark:bg-gray-900 px-6 py-6  bg-gray-50 fade-in">
                <div class="flex justify-between">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-white">
                            {{ $grupo->name }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-50">
                            {{ $grupo->gender == 'M' ? 'Masculino' : 'Femenino' }} 
                            {{ $grupo->age }} años
                        </p>
                    </div>
                    <div>
                        <x-button wire:click="$set('vista', 4)">Editar</x-button>

                    </div>
                </div>
            </div>
        </div> 

        <div>
            <dl>
                <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                        Ubicación
                    </dt>
                    <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                        {{ $grupo->name_municipality }}, {{ $grupo->name_department }}
                    </dd>
                </div>

                <div class="bg-cool-800 border-t dark:border-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                        Entrenador
                    </dt>
                    <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                        {{ $grupo->first_name }} {{ $grupo->last_name }}
                    </dd>
                </div>
                <div class="bg-cool-800 border-t dark:border-gray-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                        Pruebas Físicas Aplicadas
                    </dt>
                    <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2 flex justify-end">
                        <x-button x-on:click="$wire.open = true">Agregar Prueba</x-button>
                        
                    </dd>
                </div>
            </dl>
        </div>
    </div>

    <x-table>

        <!-- IF QUE VERIFICA SI EXISTEN REGISTROS PARA MOSTRAR -->
        @if ($atletas->count())
            <table class="min-w-full fade-in">
                <thead class="dark:bg-gray-900">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('id')">
                            ID


                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('title')">
                            Atleta

                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('content')">
                            Edad

                        </th>

                        <th scope="col" class="relative px-6 py-3">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-cool-800 divide-y divide-gray-500 px-2">
                    @foreach ($atletas as $atleta)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">{{ $atleta->id }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-50">
                                    {{ $atleta->first_name }}
                                </div>
                                <div class="text-sm text-gray-100">
                                    {{ $atleta->last_name }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">
                                    {{ $atleta->age }}
                                </div>
                            </td>

                            <td class="py-4 text-white text-left text-sm font-medium">
                                <a wire:click="show({{ $atleta }})">Perfil</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4 text-gray-50">
                No hay Atletas asignados a este grupo
            </div>
        @endif
    </x-table>

    <div x-show="$wire.open" class="fixed z-10 inset-0 overflow-y-auto" 
            aria-labelledby="modal-title" 
            role="dialog" 
            aria-modal="true"
            x-transition:enter="ease-out duration-300" 
            x-transition:enter-start="opacity-0" 
            x-transition:enter-end="opacity-100" 
            x-transition:leave="ease-in duration-200" 
            x-transition:leave-start="opacity-100" 
            x-transition:leave-end="opacity-0">
        <x-modal>
            <x-slot name="icono"></x-slot>
            <x-slot name="title">
                Aplicar Nueva Prueba Física
            </x-slot>
            <x-slot name="content">
                ¿Esta seguro de generar una nueva instancia de pruebas físicas?
            </x-slot>
            <x-slot name="footer">
                <x-button wire:click="nuevaPrueba({{ $atletas }})" class="w-full inline-flex justify-center">Aceptar</x-button>
                <x-button-danger x-on:click="$wire.open = ! $wire.open" class="w-full inline-flex justify-center">Cancelar</x-button-danger>
            </x-slot>
        </x-modal>
    </div>


    </div>