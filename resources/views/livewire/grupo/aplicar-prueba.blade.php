
<div class="py-5 px-2">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
        <div>
            <x-table>
                <div class="px-2 pt-8 flex items-center bg-gray-50 fade-in">
                    Aplicar Prueba 
                </div>
 
                <!-- IF QUE VERIFICA SI EXISTEN REGISTROS PARA MOSTRAR -->
                @if ($atletas->count())
                    <table class="min-w-full divide-y divide-gray-200 fade-in">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                        wire:click="order('id')">
                                        No


                                </th>
                                <th scope="col"
                                    class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('title')">
                                    Nombre

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Talla

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Peso

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Flexibilidad

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Despechadas
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Abdominales
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Alcance(m)
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    SVSCI(m)
                                </th>
                                <th scope="col"
                                    class="centrar text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                <center>
                                    Despegue(cm)
                                </center>
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    SLSCI(m)
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($atletas as $atleta)                                    
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            1
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $atleta->first_name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $atleta->last_name }}
                                        </div>
                                    </td>
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 1)" />
                                    </td>
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 2)" />
                                    </td>
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 3)" />
                                    </td>
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 4)" />
                                    </td>                                                        
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 5)" />
                                    </td>                           
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 6)" />
                                    </td>
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 7)" />
                                    </td>
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 8)" />
                                    </td>
                                    <td class="centrar">
                                        <x-input class="inputPrueba" wire:change="data($event.target.value, {{ $atleta->id }}, 9)" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="px-6 py-4">
                        No se encontraron Atletas Registrados en este grupo para mostrar.
                    </div>
                @endif
            </x-table>
        </div>
    </div>
</div>
                


