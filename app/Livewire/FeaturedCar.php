<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Car;

class FeaturedCar extends Component
{
    public Car $car;

    public function mount(Car $car)
    {
        $this->car = $car;
    }

    public function openBookingModal ()
    {
        $this->dispatch('openBookingModal', $this->car->id);
    }

    public function render()
    {
        return view('livewire.featured-car');
    }
}
