<?php

namespace App\Http\Livewire\Components\Navigations;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.components.navigations.navbar', [
            'title' => 'Rumahku'
        ]);
    }
}
