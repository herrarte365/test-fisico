<div>
    <x-table>
        <div class="px-2 py-8 flex items-center dark:bg-gray-900 fade-in">
            <x-input wire:model="search" placeholder="Buscar Grupo" class="w-full" />
            <x-button wire:click="$set('vista', 2)">Agregar</x-button>
        </div>
 
        <!-- IF QUE VERIFICA SI EXISTEN REGISTROS PARA MOSTRAR -->
        @if ($grupos->count())
            <table class="min-w-full divide-y divide-gray-900 fade-in">
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
                            Nombre

                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('content')">
                            Genero

                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Perfil</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-cool-800 divide-y divide-cool-900 px-2">
                    @foreach ($grupos as $grupo)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">{{ $grupo->id }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-50">
                                    {{ $grupo->name }}
                                </div>
                                <div class="text-sm text-gray-50">
                                    {{ $grupo->age }} años
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">
                                    {{ $grupo->gender == 'M' ? 'Masculino' : 'Femenino' }}
                                </div>
                            </td>

                            <td class="py-4 px-2 text-left text-sm font-medium text-gray-50">
                                <a wire:click="show({{ $grupo->id }})" class="cursor hover:text-cian-300">Perfil</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4 text-gray-50">
                No se encontraron Grupos para mostrar.
            </div>
        @endif
    </x-table>
    

</div>
