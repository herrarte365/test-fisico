<div class="fade-in">
    <div class="dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item dark:text-white">
                <a wire:click="$set('vista', 1)" class="breadcrumbs__link cursor">Entrenadores</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link text-cian-200">Agregar Entrenador</a>
            </li>
        </ul>
    </div>
    <div class="dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg my-2">
        <div class="pt-5 sm:mt-0">
            <div class="overflow-hidden sm:rounded-md">
                <div class="dark:bg-gray-900 px-4 py-5 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6 sm:col-span-3">
                            <x-label>Nombres</x-label>
                            <x-input wire:model="firstName" class="w-full dark:bg-gray-800 text-white" />
                            @error('firstName')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-label>Apellidos</x-label>
                            <x-input wire:model="lastName" class="w-full dark:bg-gray-800 text-white" />
                            @error('lastName')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <x-label>Correo</x-label>
                            <x-input type="email" wire:model="email" class="w-full dark:bg-gray-800 text-white" />
                            @error('email')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-label>Contraseña</x-label>
                            <x-input type="password" wire:model="password" class="w-full dark:bg-gray-800 text-white" />
                            @error('password')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                            
                        <div class="col-span-6 sm:col-span-3">
                            <x-label>Número de Telefono</x-label>
                            <x-input wire:model="numberPhone" class="w-full dark:bg-gray-800 text-white" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="dark:bg-gray-900 px-4 py-3 bg-gray-50 text-right sm:px-6">
                <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                    Guardar
                </x-button>
            </div>
        </div>
    </div>
</div>
