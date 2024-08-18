<?php

namespace App\Livewire\Pages;

use App\Models\Rental;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class Mycar extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'cars.brand';
    public $sortDirection = 'asc';

    protected $queryString = ['search', 'sortField', 'sortDirection'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function searchCars()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.pages.mycar', [
            'rentals' => Rental::with('car')
                ->join('cars', 'cars.id', '=', 'rentals.car_id')
                ->where('rentals.user_id', Auth::id()) // Filter rentals for the authenticated user
                ->when($this->search, function ($query) {
                    $query->where(function ($query) {
                        $query->where('cars.brand', 'like', "%{$this->search}%")
                            ->orWhere('cars.model', 'like', "%{$this->search}%")
                            ->orWhere('cars.plate_number', 'like', "%{$this->search}%");
                    });
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->select('rentals.*')
                ->paginate(12)
        ]);
    }
}