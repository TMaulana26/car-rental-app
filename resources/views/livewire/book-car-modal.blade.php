<div>
    <x-dialog-modal wire:model="showModal">
        <x-slot name="title">
            Book {{ $car->brand }} {{ $car->model }} ({{ $car->plate_number }})
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-label for="startDate" value="{{ __('Start Date') }}" />
                <x-input id="startDate" type="date" class="mt-1 block w-full" wire:model="startDate" />
                <x-input-error for="startDate" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label for="endDate" value="{{ __('End Date') }}" />
                <x-input id="endDate" type="date" class="mt-1 block w-full" wire:model="endDate" />
                <x-input-error for="endDate" class="mt-2" />
            </div>

            @if($totalCost)
                <div class="mt-4">
                    <p class="text-lg font-semibold">Total Cost: Rp. {{ number_format($totalCost, 2) }}</p>
                </div>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3" wire:click="calculateTotalCost" wire:loading.attr="disabled">
                {{ __('Calculate Cost') }}
            </x-button>

            <x-button class="ml-3" wire:click="bookCar" wire:loading.attr="disabled">
                {{ __('Confirm Booking') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    @if (session()->has('message'))
        <div x-data="{ show: true }"
             x-show="show"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-90"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-90"
             x-init="setTimeout(() => show = false, 3000)"
             class="fixed top-0 right-0 m-6 p-4 bg-green-500 text-white rounded-lg shadow-lg">
            {{ session('message') }}
        </div>
    @endif
</div>