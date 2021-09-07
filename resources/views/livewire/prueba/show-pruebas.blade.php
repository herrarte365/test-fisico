<div>
    <x-table>
        <div class="px-4 py-8 flex items-center dark:bg-gray-900 fade-in">
            <x-input wire:model="search" placeholder="Buscar Prueba" class="w-full" />
        </div>
 
        <!-- IF QUE VERIFICA SI EXISTEN REGISTROS PARA MOSTRAR -->
        @if ($pruebas->count())
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
                            Descripción

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
                            <span class="sr-only">Perfil</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-cool-800 divide-y divide-gray-500 px-2">
                    @foreach ($pruebas as $prueba)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">{{ $prueba->id }}</div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-50">
                                    {{ $prueba->description }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">
                                    {{ $prueba->gender == 'M' ? 'Masculino' : 'Femenino' }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50">
                                    {{ $prueba->age }} años
                                </div>
                            </td>

                            <td class="py-4 px-2 text-left text-sm font-medium">
                                <button wire:click="showTest({{ $prueba->id }})">
                                    <i title="Detalles" class='bx bx-detail bx-md' style='color:#48faf4'  ></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4 text-gray-50">
                No se encontraron Pruebas para mostrar.
            </div>
        @endif
    </x-table>
    
</div>
