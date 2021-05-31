<?php

namespace App\Http\Livewire\Components\SearchDropdown;

use App\Models\City;
use Livewire\Component;

class DropdownCity extends Component
{
    public $search;

    protected $listeners = [
        'emitSearchCreatedBy'
    ];

    public function updatedSearch($value)
    {
        $this->emit('changeCreatedBy', $value);
    }

    public function chooseOption($option)
    {
        $this->emit('chooseCreatedBy', $option);
    }

    public function emitSearchCreatedBy($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        if (strlen($this->search) >= 2) {
            $options = City::where('name', 'like', '%' . $this->search . '%')
                    ->orderBy('name')
                    ->paginate(10);
        }

        return view('livewire.components.search-dropdown.dropdown-city', [
            'options' => $this->search
                ? $options
                : []
        ]);
    }
}
