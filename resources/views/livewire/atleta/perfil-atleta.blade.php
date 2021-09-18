<div class="fade-in">
    <div class="dark:bg-gray-900 overflow-hidden shadow rounded-lg">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a wire:click="$set('vista', 1)" class="text-gray-100 cursor">Atletas</a>
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
                            {{ $atleta->first_name }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-50">
                            Atleta Nivel {{ $atleta->current_level }}
                        </p>
                    </div> 
                    <div>
                        <x-button wire:click="$set('vista', 4)">Editar</x-button>
                    </div>
                </div>
            </div> 
        </div>
        <div class="bg-cool-800">
            <dl>
            <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-100">
                    Nombre Completo
                </dt>
                <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                    {{ $atleta->first_name }} {{ $atleta->last_name }}
                </dd>
            </div>
            <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-100">
                    Nivel General
                </dt>
                <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                    Nivel {{ $atleta->current_level }}
                </dd>
            </div>
            <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-100">
                Genero
                </dt>
                <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                    @if($atleta->gender == 'F')
                        Femenino
                    @else
                        Masculino
                    @endif
                </dd>
            </div>
            <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-100">
                Fecha de Nacimiento
                </dt>
                <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                {{ date("d-m-Y", strtotime($atleta->date_of_birth)) }}
                </dd>
            </div>
            <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-100">
                Edad
                </dt>
                <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                    {{ $edadActual }}
                </dd>
            </div>
            <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-100">
                Observaciones
                </dt>
                <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                    @if($atleta->observaciones != null)
                        {{ $atleta->observations }}
                    @else
                        Sin Observaciones
                    @endif
                </dd>
            </div>
            <div class="bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-100">
                Pruebas Físicas Aplicadas
                </dt>
                <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                    @foreach ($pruebas as $prueba)
                        <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                            
                        <div class="w-0 flex-1 flex items-center">
                            <!-- Heroicon name: solid/paper-clip -->
                            <i class='bx bx-notepad bx-sm'></i>
                            <span class="ml-2 flex-1 w-0 truncate">
                                {{ $prueba->description }}
                            </span>
                        </div>
                        <div class="ml-4 flex-shrink-0">
                            <a wire:click="showPrueba({{ $prueba }})" class="cursor hover:text-cian-300">
                                Detalles
                            </a>
                        </div>
                        </li>
                    @endforeach
                </ul>
                </dd>
            </div>
            </dl>
        </div>
        </div>
    </div>
</div>
