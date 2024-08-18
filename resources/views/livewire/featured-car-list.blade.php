<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    @foreach ($featuredCars as $car)
        <livewire:featured-car :car="$car" />
    @endforeach

    <livewire:book-car-modal />
</div>
