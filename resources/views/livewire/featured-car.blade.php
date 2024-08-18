<div
    class="max-w-xs mx-auto bg-white dark:bg-gray-700 rounded-xl overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl">
    <div class="p-4 text-center">
        <h3 class="text-lg font-semibold text-red-600">{{ $car->brand }}</h3>
        <p class="text-gray-500 dark:text-gray-400">{{ $car->model }}</p>
    </div>
    <img src="{{ asset('storage/' . $car->image_path) }}" alt="{{ $car->brand }} {{ $car->model }}" class="w-full h-52 object-cover">
    <div class="p-5 text-center">
        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">{{ $car->plate_number }}</h4>
        <p class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3">Rp. {{ number_format($car->daily_rate, 2) }} /day</p>
        <p class="mb-4">
            @if ($car->is_available)
                <span class="inline-block bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">Available</span>
            @else
                <span class="inline-block bg-red-100 text-red-800 text-sm font-medium px-3 py-1 rounded-full">Not Available</span>
            @endif
        </p>
        @if($car->is_available)
            <x-button wire:click="openBookingModal" class="bg-red-600 hover:bg-red-700">
                Book Now
            </x-button>
        @endif
    </div>
</div>