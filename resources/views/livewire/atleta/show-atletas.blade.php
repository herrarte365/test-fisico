<div>
    <x-table>
        <div class="px-2 py-8 flex items-center dark:bg-gray-900 fade-in">
            <x-input wire:model="search" class="w-full" placeholder="Buscar Atleta" />
            <x-button wire:click="$set('vista', 2)">Agregar</x-button>
        </div>

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
                            Nivel

                        </th>                          
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('content')">
                            Genero

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
                                    {{ $atleta->current_level }}
                                </div>
                            </td> 
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">
                                    {{ $atleta->gender == 'F' ? 'Femenino' : 'Masculino' }} 
                                </div>
                            </td>
                           
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">
                                    {{ $atleta->age }} años
                                </div>
                            </td>


                            <td class="py-4 text-white text-left text-sm font-medium">
                                <button wire:click="show({{ $atleta }})">
                                    <i title="Perfil de Usuario" class='bx bx-user-pin bx-md bx-tada-hover'></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4 text-gray-50">
                No se encontraron Atletas para mostrar.
            </div>
        @endif
    </x-table>
    

</div>
