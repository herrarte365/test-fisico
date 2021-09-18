<x-app-layout>
    <x-slot name="header">
        Entrenamientos
    </x-slot>

    <div class="py-5 px-2" x-data>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('entrenamiento.show-entrenamiento')
        </div>
    </div>
</x-app-layout>
