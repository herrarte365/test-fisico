<x-app-layout>
    <x-slot name="header">
        Atletas
    </x-slot>

    <div class="py-5 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @livewire('show-atletas')
        </div>
    </div>
</x-app-layout>
