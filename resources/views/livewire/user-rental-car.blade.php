<div class="max-w-xs mx-auto bg-white dark:bg-gray-700 rounded-xl overflow-hidden shadow-lg transform transition duration-300 hover:scale-105 hover:shadow-xl">
    @if($rental)
        <div class="p-4 text-center">
            <h3 class="text-lg font-semibold text-red-600">{{ $rental->car->brand }}</h3>
            <p class="text-gray-500 dark:text-gray-400">{{ $rental->car->model }}</p>
            {{-- <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-1">{{ $rental->car->plate_number }}</h4> --}}
            <p class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-3">Rp.
                {{ number_format($rental->car->daily_rate, 2) }} /day</p>
        </div>
        <img src="{{ asset('storage/' . $rental->car->image_path) }}"
            alt="{{ $rental->car->brand }} {{ $rental->car->model }}" class="w-full h-52 object-cover">
        <div class="p-5 text-center">
            <p class="text-gray-600 dark:text-gray-400 mb-2">Start Date: {{ $rental->start_date->format('d M Y') }}</p>
            <p class="text-gray-600 dark:text-gray-400 mb-2">End Date: {{ $rental->end_date->format('d M Y') }}</p>
            <p class="text-gray-800 dark:text-gray-200 mb-4">Initial Cost: Rp. {{ number_format($rental->total_cost, 2) }}</p>
            
            @if ($rental->status === 'active')
                <form wire:submit.prevent="returnCar" class="mb-4">
                    <div class="mb-4">
                        <label for="plateNumber" class="block text-gray-700 text-sm font-bold mb-2">Enter Plate Number to Return:</label>
                        <input type="text" id="plateNumber" wire:model="plateNumber" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @error('plateNumber') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>
                    <x-button type="submit" class="bg-red-600 hover:bg-red-700">
                        Return Now
                    </x-button>
                </form>
            @else
                <span class="inline-block bg-green-100 text-green-800 text-sm font-medium px-3 py-1 rounded-full">Returned</span>
            @endif
        </div>
    @else
        <div class="p-4 text-center">
            <p class="text-gray-600 dark:text-gray-400">No active rental found.</p>
        </div>
    @endif
    
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
            <p>{{ session('message') }}</p>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
            <p>{{ session('error') }}</p>
        </div>
    @endif
</div>