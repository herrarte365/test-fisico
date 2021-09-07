<div class="fade-in">
    <div class="dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item dark:text-white">
                <a wire:click="$set('vista', 1)" class="breadcrumbs__link cursor">Entrenadores</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link text-cian-200">Perfil</a>
            </li>
        </ul>
    </div>
    
    <div class="overflow-hidden shadow sm:rounded-lg my-2">
        <div class="bg-cool-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-6 py-6  dark:bg-gray-900 fade-in">

                <div class="flex justify-between">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-white">
                            {{ $entrenador->first_name }} {{ $entrenador->last_name }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-50">
                            Entrenador
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
                    <dt class="text-sm font-medium text-gray-50">
                        Número de Telefono
                    </dt>
                    <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                        {{ $entrenador->number_phone }}
                    </dd>
                </div>
                <div class="border-t border-gray-900 bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                        Correo Electronico
                    </dt>
                    <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                        -
                    </dd>
                </div>
            
                <div class="border-t border-gray-900 bg-cool-800 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-50">
                    Grupos Asignados
                    </dt>
                    <dd class="mt-1 text-sm text-white sm:mt-0 sm:col-span-2">
                        <ul class="border border-gray-200 rounded-md divide-y divide-gray-200">
                            <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                <div class="w-0 flex-1 flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 flex-1 w-0 truncate">
                                        Grupo 1 - Femenino - 13 años
                                    </span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Ver
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
