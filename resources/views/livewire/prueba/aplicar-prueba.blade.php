<x-slot name="header">
    Atletas
</x-slot>

<div class="py-5 px-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-50 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Registro de Pruebas Fisicas
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{ $atleta->first_name }} {{ $atleta->last_name }}
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Talla
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                        <x-input-info>
                                cm
                        </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Peso
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input-info>
                                lb
                            </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Flexibilidad
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input class="w-full" />
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Despechadas
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input class="w-full" />
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Abdominales
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input class="w-full" />
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Alcance
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input-info>
                                m
                            </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            SVSCI
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input-info>
                                m
                            </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Despegue
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input-info>
                                cm
                            </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            SLSCI
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input-info>
                                m
                            </x-input-info>
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Velocidad
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input class="w-full" />
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-md font-medium text-gray-500">
                            Resistencia
                        </dt>
                        <dd class="mt-1 text-md text-gray-900 sm:mt-0 sm:col-span-2">
                            <x-input class="w-full" />
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
