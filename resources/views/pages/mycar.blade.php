<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Rental Cars') }}
        </h2>
    </x-slot>

    <div class="bg-gray-200 dark:bg-gray-900">
        @livewire('pages.mycar')
        <x-footer />
    </div>
</x-app-layout>
