<div class="fade-in">
    <div class="dark:bg-gray-900 overflow-hidden shadow rounded-lg">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a wire:click="$set('vista', 1)" class="breadcrumbs__link cursor">Pruebas</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link text-cian-300">Perfil</a>
            </li>
        </ul>
    </div>
    <div class="overflow-hidden shadow rounded-lg my-2">
        <div class="bg-cool-800 shadow overflow-hidden">
            <div class="px-6 py-6  dark:bg-gray-900 fade-in">
                <div class="flex justify-between">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-white">
                            {{ $test[0]->description }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-50">
                            {{ $test[0]->gender }} - {{ $test[0]->age }}
                        </p>
                    </div> 
                    <div>
                        <a target="_blank" href="{{ route('reportePruebaGrupoPDF', $test[0]->id) }}"><x-button-danger class="px-3 py-2">pdf</x-button-danger></a>
                    </div>
                </div>
            </div>  
        </div>    
    </div>
    <div>
            <x-table>
                <div class="px-2 pb-5 px-4 text-2xl flex items-center dark:bg-gray-900 fade-in">
                    <p class="text-2xl py-5 text-white">
                        Resultados
                    </p>
                </div>
 
                <!-- IF QUE VERIFICA SI EXISTEN REGISTROS PARA MOSTRAR -->
                @if ($atletas->count())
                    <table class="min-w-full divide-y divide-gray-200 fade-in">
                        <thead class="dark:bg-gray-900">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                        wire:click="order('id')">
                                        No


                                </th>
                                <th scope="col"
                                    class="px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('title')">
                                    Nombre

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Talla

                                </th>

                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Flexibilidad

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Despechadas
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Abdominales
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Alcance(m)
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    SVSCI(m)
                                </th>
                                <th scope="col"
                                    class="centrar text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                <center>
                                    Despegue(cm)
                                </center>
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    SLSCI(m)
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Velocidad
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Resistencia
                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Peso

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Total Puntos

                                </th>
                                <th scope="col"
                                    class="centrar px-6 py-2 text-left text-xs font-medium text-white uppercase tracking-wider cursor-pointer"
                                    wire:click="order('content')">
                                    Nivel General

                                </th>
                            </tr>
                        </thead> 
                        <tbody class="bg-cool-800 text-white divide-y divide-gray-200">
                            @foreach ($atletas as $atleta)                                    
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-white">
                                            {{ $atleta->id }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-white">
                                            {{ $atleta->first_name }}
                                        </div>
                                        <div class="text-sm text-gray-100">
                                            {{ $atleta->last_name }}
                                        </div>
                                    </td>
                                    <td>
                                        <p>Nivel</p>
                                        <p>Resultado</p>
                                    </td>
                                    @foreach ($resultados as $r)
                                        @if($atleta->id == $r->athlete_id)
                                            <td class="centrar">
                                                <p>{{ number_format($r->level, 0) }}</p>
                                                <p>{{ $r->result }}</p>
                                            </td>
                                        @endif
                                    @endforeach
                                    <td class="centrar">
                                        @if(is_null($atleta->general_score))
                                            <p class="text-cian-300">NC</p>
                                        @else 
                                            <p class="text-cian-300">{{ $atleta->general_score }}</p>
                                        @endif
                                    </td>
                                    <td class="centrar">
                                        @if(is_null($atleta->general_level))
                                            <p class="text-cian-300">NC</p>
                                        @else 
                                            <p class="text-cian-300">{{ $atleta->general_level }}</p>
                                        @endif
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
