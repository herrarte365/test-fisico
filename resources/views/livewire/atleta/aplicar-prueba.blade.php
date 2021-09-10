<x-slot name="header">
    Atletas
</x-slot>

<div class="px-2" x-data>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 fade-in">
        <div class="dark:bg-gray-900 overflow-hidden shadow rounded-lg my-2">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a wire:click="$set('vista', 3)" class="breadcrumbs__link cursor">Perfil</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link text-cian-300">Prueba Física</a>
            </li>
        </ul>
    </div>
        <div class="dark:bg-gray-900 shadow overflow-hidden rounded-lg fade-in">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-white">
                    Registro de Pruebas Fisicas
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-100">
                    {{ $atleta->first_name }} {{ $atleta->last_name }}
                </p>
            </div>
            <div class="bg-cool-800">
                <dl> 
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Talla
                        </dt>
                        <dd class="mt-1 text-md text-white sm:mt-0 sm:col-span-2">
                            <div>
                                <x-input-info type="number" value="{{ $detalles[0]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[0]->id }}, {{ $detalles[0]->test_id }})">
                                        cm
                                </x-input-info><br>
                            </div>
                            <div>
                                <x-input-info disabled value="{{ $detalles[0]->level }}">
                                    NIVEL
                                </x-input-info>
                            </div>
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Flexibilidad
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input type="number" class="w-full" value="{{ $detalles[1]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[1]->id }}, {{ $detalles[1]->test_id }})" />
                            <x-input-info disabled value="{{ $detalles[1]->level }}">
                                NIVEL
                            </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Despechadas
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input type="number" class="w-full" value="{{ $detalles[2]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[2]->id }}, {{ $detalles[2]->test_id }})" />
                            <x-input-info disabled value="{{ $detalles[2]->level }}">
                                NIVEL
                            </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Abdominales
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input type="number" class="w-full" value="{{ $detalles[3]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[3]->id }}, {{ $detalles[3]->test_id }})"/>
                            <x-input-info disabled value="{{ $detalles[3]->level }}">
                                NIVEL
                            </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Alcance
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <div>
                                <x-input-info type="number" value="{{ $detalles[4]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[4]->id }}, {{ $detalles[4]->test_id }})">
                                    m
                                </x-input-info>
                            </div>
                            <div>
                                <x-input-info disabled value="{{ $detalles[4]->level }}">
                                    NIVEL
                                </x-input-info>
                            </div>
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            SVSCI
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <div>
                                <x-input-info type="number" value="{{ $detalles[5]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[5]->id }}, {{ $detalles[5]->test_id }})">
                                    m
                                </x-input-info>
                            </div>
                            <div>
                                <x-input-info disabled value="{{ $detalles[5]->level }}">
                                    NIVEL
                                </x-input-info>
                            </div>                            
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Despegue
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <div>
                                <x-input-info type="number" value="{{ $detalles[6]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[6]->id }}, {{ $detalles[6]->test_id }})">
                                    cm
                                </x-input-info>
                            </div>
                            <div>
                                <x-input-info disabled value="{{ $detalles[6]->level }}">
                                    NIVEL
                                </x-input-info>
                            </div>                            
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            SLSCI
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <div>
                                <x-input-info type="number" value="{{ $detalles[7]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[7]->id }}, {{ $detalles[7]->test_id }})">
                                    m
                                </x-input-info>
                            </div>
                            <div>
                                <x-input-info disabled value="{{ $detalles[7]->level }}">
                                    NIVEL
                                </x-input-info>
                            </div>                        
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Velocidad
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input class="w-full" value="{{ $detalles[8]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[8]->id }}, {{ $detalles[8]->test_id }})" />
                            <x-input-info disabled value="{{ $detalles[8]->level }}">
                                NIVEL
                            </x-input-info>                            
                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Resistencia 
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input class="w-full" value="{{ $detalles[9]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[9]->id }}, {{ $detalles[9]->test_id }})"/>
                            <x-input-info disabled value="{{ $detalles[9]->level }}">
                                NIVEL
                            </x-input-info>

                        </dd>
                    </div>
                    <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-100">
                            Peso
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input-info type="number" value="{{ $detalles[10]->result }}" wire:change="calculadora($event.target.value, {{ $detalles[10]->id }}, {{ $detalles[10]->test_id }})">
                                lb
                            </x-input-info>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 dark:bg-gray-800 gap-4">
            <div class="dark:bg-gray-900 shadow overflow-hidden rounded-lg mt-5">
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex justify-between">
                    <div>
                    <h3 class="text-lg leading-6 font-medium text-white">
                        Resultados
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-white">
                        Resultados Finales
                    </p>
                    </div>
                    <div>
                        <x-button class="w-full" wire:click="resultados()">Caclular</x-button>
                    </div>
                </div>

                </div>
                <div class="bg-cool-800">
                    <dl>
                        <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-100 text-right py-2">
                                Puntaje General
                            </dt>
                            <dd class="mt-1 text-md text-white sm:mt-0 sm:col-span-2">
                                <x-input type="number" disabled class="w-full" wire:model="puntajeGeneral" />
                            </dd>
                        </div>
                        <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-md font-medium text-gray-100 text-right">
                                Nivel General
                            </dt>
                            <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2 ">
                                <x-input type="number" disabled class="w-full" wire:model="nivelGeneral" />
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="bg-cool-800 shadow overflow-hidden rounded-lg mt-5">
                <div class="dark:bg-gray-900 px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-white text-center">
                        Reportes
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-white text-center">
                        Exportar resultados finales
                    </p>
                </div>
                <div class="px-4 py-5 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-4">
                        <a target="_blank" href="{{ route('reportePruebaAtletaPDF', $this->prueba->physical_test_id) }}"><x-button-danger class="w-full">PDF</x-button-danger></a>
                </div>
            </div>
        </div>
    </div>

</div>


