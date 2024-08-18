<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-6">Our Cars</h1>

    <div class="mb-4 flex items-center justify-between">
        <div class="flex items-center space-x-2 w-full max-w-md">
            <input wire:model.defer="search" type="text" placeholder="Search cars..."
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-red-500">
            <button wire:click="searchCars"
                class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition duration-300">
                Search
            </button>
        </div>
        <div class="flex space-x-2">
            <button wire:click="sortBy('brand')" class="px-4 py-2 bg-red-600 text-white rounded-lg">
                Brand
                @if ($sortField === 'brand')
                    @if ($sortDirection === 'asc')
                        ↑
                    @else
                        ↓
                    @endif
                @endif
            </button>
            <button wire:click="sortBy('model')" class="px-4 py-2 bg-red-600 text-white rounded-lg">
                Model
                @if ($sortField === 'model')
                    @if ($sortDirection === 'asc')
                        ↑
                    @else
                        ↓
                    @endif
                @endif
            </button>
            <button wire:click="sortBy('daily_rate')" class="px-4 py-2 bg-red-600 text-white rounded-lg">
                Daily Rate
                @if ($sortField === 'daily_rate')
                    @if ($sortDirection === 'asc')
                        ↑
                    @else
                        ↓
                    @endif
                @endif
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($cars as $car)
            <livewire:featured-car :car="$car" />
        @endforeach
    </div>

    <livewire:book-car-modal />

    <div class="mt-6">
        {{ $cars->links() }}
    </div>
</div>
