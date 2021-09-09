<div class="fade-in">
    <div class="dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a wire:click="$set('vista', 1)" class="breadcrumbs__link cursor">Atletas</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link text-cian-300">Agregar Atleta</a>
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
                            <x-input autofocus wire:model="firstName" class="w-full" />
                            @error('firstName')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-label>Apellidos</x-label>
                            <x-input wire:model="lastName" class="w-full" />
                            @error('lastName')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <x-label>Fecha de Nacimiento</x-label>
                            <x-input type="date" wire:model="birthdayDate" class="w-full"/>
                            @error('birthdayDate')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <x-label>Edad</x-label>
                            <x-input disabled wire:model="age" class="w-full"/>
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <x-label>Genero</x-label>
                            <x-select wire:model="gender" class="w-full">
                                <option selected>Seleccionar...</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </x-select>
                            @error('gender')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        
                        <div class="col-span-6 sm:col-span-3">
                            <x-label>Establecimiento</x-label>
                            <x-input wire:model="establishment" class="w-full" />
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <x-label>Grupo</x-label>
                            <x-select wire:model="groupId" class="w-full">
                                <option selected>Seleccionar...</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">
                                        {{ $grupo->name }} 
                                        ({{ $grupo->gender }})({{ $grupo->age }})
                                    </option>
                                @endforeach
                            </x-select>
                            @error('groupId')
                                <p class="text-red-600 md:text-red-600">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="col-span-6">
                            <x-label>Observaciones</x-label>
                            <x-input wire:model="observations" class="w-full" />
                        </div>
                        
                    </div>
                </div>
                <div class="px-4 py-3 dark:bg-gray-900 text-right sm:px-6">
                    <x-button wire:click="save" wire:loading.attr="disabled" wire:target="save">
                        Guardar
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</div>
