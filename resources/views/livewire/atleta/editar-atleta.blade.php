<div>
    <div class="bg-gray-50 overflow-hidden shadow sm:rounded-lg fade-in">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item">
                <a wire:click="$set('vista', 1)" class="breadcrumbs__link cursor">Atletas</a>
            </li>
            <li class="breadcrumbs__item">
                <a wire:click="$set('vista', 3)" class="breadcrumbs__link cursor">Perfil</a>
            </li>
            <li class="breadcrumbs__item">
                <a class="breadcrumbs__link breadcrumbs__link--active">Editar Atleta</a>
            </li>
        </ul>
    </div>
    <div class="bg-gray-50 overflow-hidden shadow sm:rounded-lg my-2 fade-in">
        <div class="pt-5 sm:mt-0">
            <form action="#" method="POST">
                <div class="overflow-hidden sm:rounded-md">
                    <div class="bg-gray-50 px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-4">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Nombres</label>
                                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Apellidos</label>
                                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Edad</label>
                                <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-3 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Genero</label>
                                <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>Masculino</option>
                                    <option>Femenino</option>
                                </select>
                            </div>
                            
                            <div class="col-span-6 sm:col-span-3">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Establecimiento</label>
                                <input type="text" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                                <input type="date" name="email-address" id="email-address" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Departamento</label>
                                <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Municipio</label>
                                <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                                </select>
                            </div>

                        <div class="col-span-6">
                            <label for="street-address" class="block text-sm font-medium text-gray-700">Observaciones</label>
                            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
