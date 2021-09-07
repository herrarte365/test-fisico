<x-app-layout>
    <x-slot name="header">
        Grupos
    </x-slot>

    <div class="py-5 px-2" x-data>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('show-grupos')
        </div>
    </div>
</x-app-layout>
