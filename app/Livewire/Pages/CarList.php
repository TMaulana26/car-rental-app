<?php

namespace App\Livewire\Pages;

use App\Models\Car;
use Livewire\Component;
use Livewire\WithPagination;

class CarList extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'brand';
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
        return view('livewire.pages.car-list', [
            'cars' => Car::when($this->search, function ($query) {
                $query->search($this->search);
            })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(12)
        ]);
    }
}
