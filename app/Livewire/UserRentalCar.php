<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ReturnCar;
use App\Models\Rental;
use Carbon\Carbon;

class UserRentalCar extends Component
{
    public $rental;
    public $plateNumber;
    public $returnDate;
    public $totalCost;
    public $additionalCost;

    protected $rules = [
        'plateNumber' => 'required|string',
    ];

    public function mount(Rental $rental)
    {
        $this->rental = $rental;
    }

    public function render()
    {
        // Check if there's a newer rental for the same car
        $newerRental = Rental::where('user_id', $this->rental->user_id)
            ->where('car_id', $this->rental->car_id)
            ->where('start_date', '>', $this->rental->start_date)
            ->where('status', 'active')
            ->first();

        if ($newerRental) {
            $this->rental = $newerRental;
        }

        return view('livewire.user-rental-car');
    }

    public function returnCar()
    {
        $this->validate();

        // Verify that the car belongs to this rental
        if ($this->rental->car->plate_number !== $this->plateNumber) {
            session()->flash('error', 'The plate number does not match the rented car.');
            return;
        }

        // Calculate rental duration and costs
        $startDate = Carbon::parse($this->rental->start_date);
        $endDate = Carbon::parse($this->rental->end_date);
        $returnDate = Carbon::now();
        $this->returnDate = $returnDate->toDateString();

        $rentalDays = $startDate->diffInDays($returnDate) + 1; // Including the first day
        $this->totalCost = $rentalDays * $this->rental->car->daily_rate;
        
        // Calculate additional cost if returned late
        if ($returnDate->gt($endDate)) {
            $extraDays = $returnDate->diffInDays($endDate);
            $this->additionalCost = $extraDays * $this->rental->car->daily_rate;
            $this->totalCost += $this->additionalCost;
        } else {
            $this->additionalCost = 0;
        }

        // Create a new ReturnCar record
        $returnCar = ReturnCar::create([
            'rental_id' => $this->rental->id,
            'return_date' => $this->returnDate,
            'additional_cost' => $this->additionalCost,
            'notes' => 'Returned by user',
        ]);

        // Update the car's availability
        $this->rental->car->update(['is_available' => true]);

        // Update the rental status and total cost
        $this->rental->update([
            'status' => 'completed',
            'total_cost' => $this->totalCost,
        ]);

        // Emit an event to refresh the parent component if necessary
        $this->dispatch('carReturned');

        // Show a success message
        session()->flash('message', 'Car returned successfully. Total cost: Rp. ' . number_format($this->totalCost, 2));
    }
}