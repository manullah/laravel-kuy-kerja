<?php

namespace App\Http\Livewire\Components\SearchDropdown;

use App\Models\JobPosition;
use Livewire\Component;

class DropdownJobPosition extends Component
{
    public $search;

    protected $listeners = [
        'emitSearchJobPosition'
    ];

    public function updatedSearch($value)
    {
        $this->emit('changeJobPosition', $value);
    }

    public function chooseOption($option)
    {
        $this->emit('chooseJobPosition', $option);
    }

    public function emitSearchJobPosition($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.components.search-dropdown.dropdown-job-position', [
            'options' => $this->search
                ? JobPosition::where('name', 'like', '%' . $this->search . '%')->orderBy('name')->paginate(5)
                : JobPosition::orderBy('name')->paginate(5)
        ]);
    }
}
