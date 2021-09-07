<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="pt-2 px-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="dark:bg-gray-900 overflow-hidden shadow-xl rounded-lg">
                @livewire('info-dash')
            </div>
        </div>
    </div>
</x-app-layout>
