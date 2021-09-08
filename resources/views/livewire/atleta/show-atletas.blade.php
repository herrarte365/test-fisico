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
                            @if($sort == 'id')
                                @if($direction == 'asc')
                                    <i class='bx bx-up-arrow-alt' ></i>
                                @else
                                    <i class='bx bx-down-arrow-alt' ></i>
                                @endif
                            @else
                                <i class='bx bx-sort-alt-2' ></i>
                            @endif
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('first_name')">
                            Atleta
                            @if($sort == 'first_name')
                                @if($direction == 'asc')
                                    <i class='bx bx-up-arrow-alt' ></i>
                                @else
                                    <i class='bx bx-down-arrow-alt' ></i>
                                @endif
                            @else
                                <i class='bx bx-sort-alt-2' ></i>
                            @endif
                        </th>

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('current_level')">
                            Nivel
                            @if($sort == 'current_level')
                                @if($direction == 'asc')
                                    <i class='bx bx-up-arrow-alt' ></i>
                                @else
                                    <i class='bx bx-down-arrow-alt' ></i>
                                @endif
                            @else
                                <i class='bx bx-sort-alt-2' ></i>
                            @endif                            
                        </th>    

                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('gender')">
                            Genero
                            @if($sort == 'gender')
                                @if($direction == 'asc')
                                    <i class='bx bx-up-arrow-alt' ></i>
                                @else
                                    <i class='bx bx-down-arrow-alt' ></i>
                                @endif
                            @else
                                <i class='bx bx-sort-alt-2' ></i>
                            @endif                            
                        </th>
                      
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('age')">
                            Edad
                            @if($sort == 'age')
                                @if($direction == 'asc')
                                    <i class='bx bx-up-arrow-alt' ></i>
                                @else
                                    <i class='bx bx-down-arrow-alt' ></i>
                                @endif
                            @else
                                <i class='bx bx-sort-alt-2' ></i>
                            @endif                            
                        </th>

                        <th scope="col" class="relative px-6 py-3">
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-cool-800 divide-y divide-cool-900 px-2">
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
                                    <i title="Perfil de Atleta" class='bx bx-user hover:bg-cian-500' ></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4 text-gray-50 bg-cool-800">
                No se encontraron Atletas para mostrar.
            </div>
        @endif
        @if($atletas->hasPages())
            <div class="px-6 py-3 bg-cool-800 text-white">
                 <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
            <span>
                {{-- Previous Page Link --}}
                @if ($atletas->onFirstPage())
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-text-white bg-gray-500 border border-none cursor-default leading-5 rounded-md">
                        Anterior
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-cian-500 border border-none leading-5 rounded-md hover:text-text-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-cian-500 active:text-gray-700 transition ease-in-out duration-150">
                        Anterior
                    </button>
                @endif
            </span>
            
            <span>

                <div class="pt-2">
                Página {{ $atletas->currentPage() }} de {{ $paginas }}
                </div>

            </span>


            <span>
                {{-- Next Page Link --}}
                @if ($atletas->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-cian-500 border border-none leading-5 rounded-md hover:text-text-white focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                        Siguiente
                    </button>
                @else
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-text-white bg-gray-500 border border-none cursor-default leading-5 rounded-md">
                        Siguiente
                    </span>
                @endif
            </span>
        </nav>

            </div>
        @endif
    </x-table>
    

</div>
