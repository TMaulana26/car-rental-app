<?php

namespace App\Livewire;

use Livewire\Component;

class DarkModeToggle extends Component
{
    public $isDarkMode;

    public function mount()
    {
        $this->isDarkMode = session('dark-mode', true);
    }

    public function toggleDarkMode()
    {
        $this->isDarkMode = !$this->isDarkMode;
        session(['dark-mode' => $this->isDarkMode]);
    }

    public function render()
    {
        return view('livewire.dark-mode-toggle');
    }
}
