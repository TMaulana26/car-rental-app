<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="bg-gray-200 dark:bg-gray-900">
        @livewire('pages.car-list')
        <x-footer />
    </div>
</x-app-layout>
