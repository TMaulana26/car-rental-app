<?php

namespace App\Livewire;

use App\Models\Car;
use App\Models\Rental;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class BookCarModal extends Component
{
    public $car;
    public $showModal = false;
    public $startDate;
    public $endDate;
    public $totalCost;

    protected $rules = [
        'startDate' => 'required|date|after:today',
        'endDate' => 'required|date|after:startDate',
    ];

    protected $listeners = [
        'openBookingModal' => 'openModal',
    ];

    public function mount(Car $car)
    {
        $this->car = $car;
    }

    public function openModal($carId)
    {
        $this->car = Car::findOrFail($carId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['startDate', 'endDate', 'totalCost']);
    }

    public function updatedStartDate()
    {
        $this->calculateTotalCost();
    }

    public function updatedEndDate()
    {
        $this->calculateTotalCost();
    }

    public function calculateTotalCost()
    {
        if ($this->startDate && $this->endDate) {
            $start = \Carbon\Carbon::parse($this->startDate);
            $end = \Carbon\Carbon::parse($this->endDate);
            $days = $start->diffInDays($end) + 1;
            $this->totalCost = $days * $this->car->daily_rate;
        }
    }

    public function bookCar()
    {
        $this->validate();

        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $this->car->id,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate,
            'total_cost' => $this->totalCost,
            'status' => 'active',
        ]);

        $this->car->update(['is_available' => false]);

        session()->flash('message', 'Car booked successfully!');
        $this->closeModal();
        $this->dispatch('resetPage');
    }

    public function render()
    {
        return view('livewire.book-car-modal');
    }
}
