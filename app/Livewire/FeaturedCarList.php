<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class FeaturedCarList extends Component
{
    public function render()
    {
        $featuredCars = Car::query()->limit(3)->get();
        return view('livewire.featured-car-list', ['featuredCars' => $featuredCars]);
    }
}
