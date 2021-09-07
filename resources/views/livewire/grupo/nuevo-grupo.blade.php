<div class="fade-in">
    <div class="dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a wire:click="$set('vista', 1)" class="breadcrumbs__link cursor">Grupos</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link text-cian-300">Agregar Grupo</a>
            </li>
        </ul>
    </div>

    <div class="dark:bg-gray-900 overflow-hidden shadow sm:rounded-lg my-2">
        <div class="pt-5 sm:mt-0">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="dark:bg-gray-900 px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-4">
                            <div class="col-span-6 sm:col-span-3">
                                <x-label>Nombre</x-label>
                                <x-input wire:model="name" class="w-full" />
                                @error('name')
                                    <p class="text-blue-600 md:text-green-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                                <x-label>Edad</x-label>
                                <x-input type="number" wire:model="age" class="w-full" />
                                @error('age')
                                    <p class="text-blue-600 md:text-green-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                                <x-label>Genero</x-label>
                                <x-select wire:model="gender">
                                    <option>Seleccionar...</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                </x-select>
                                @error('gender')
                                    <p class="text-blue-600 md:text-green-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label>Departamento</x-label>
                                <x-select wire:model="departamento">
                                    <option selected>Seleccionar...</option>
                                    @foreach ($departamentos as $departamento)
                                        <option value="{{ $departamento->id }}">
                                            {{ $departamento->name_department }}
                                        </option>
                                    @endforeach
                                </x-select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <x-label>Municipio</x-label>
                                <x-select wire:model="municipalityId">
                                    @foreach ($municipios as $municipio)
                                        <option value="{{ $municipio->id }}">{{ $municipio->name_municipality }}</option>
                                    @endforeach
                                </x-select>
                                @error('municipalityId')
                                    <p class="text-blue-600 md:text-green-600">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
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
