<div>
    <x-table>
        <div class="px-3 py-8 flex items-center dark:bg-gray-900 fade-in">
            <x-input class="w-full" placeholder="Buscar Entrenador"/>
            <x-button wire:click="$set('vista', 2)">Agregar</x-button>
        </div>

        <!-- IF QUE VERIFICA SI EXISTEN REGISTROS PARA MOSTRAR -->
        @if ($entrenadores->count())
            <table class="min-w-full divide-y divide-gray-900 fade-in">
                <thead class="dark:bg-gray-900">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-cian-300 text-xs font-medium text-white uppercase tracking-wider pointer"
                            wire:click="order('id')">
                            ID


                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-cian-300 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('title')">
                            Entrenador

                        </th>

                        <th scope="col"
                            class="centrar px-6 py-3 text-cian-300 text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                            wire:click="order('content')">
                            ID Usuario
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-cool-800 divide-y divide-cool-900 px-2">
                    @foreach ($entrenadores as $entrenador)
                        <tr>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50 text-center">
                                    {{ $entrenador->id }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-white">
                                    {{ $entrenador->first_name }}
                                </div>
                                <div class="text-sm text-gray-50">
                                    {{ $entrenador->last_name }}
                                </div>
                            </td>

                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-50 centrar">
                                    {{ $entrenador->user_id }}
                                </div>
                            </td>
                            <td class="py-4 px-2 text-left text-sm font-medium text-gray-50">
                                <a wire:click="show({{ $entrenador }})" class="cursor hover:text-cian-300">Perfil</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                No se encontraron alumnos para mostrar.
            </div>
        @endif
    </x-table>
    

</div>
