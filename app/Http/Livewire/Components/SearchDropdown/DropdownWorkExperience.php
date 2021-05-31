<?php

namespace App\Http\Livewire\Components\SearchDropdown;

use App\Models\WorkExperience;
use Livewire\Component;

class DropdownWorkExperience extends Component
{
    public $search;

    protected $listeners = [
        'emitSearchWorkExperience'
    ];

    public function updatedSearch($value)
    {
        $this->emit('changeWorkExperience', $value);
    }

    public function chooseOption($option)
    {
        // dd($option);
        $this->emit('chooseWorkExperience', $option);
    }

    public function emitSearchWorkExperience($search)
    {
        // dd($search);
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.components.search-dropdown.dropdown-work-experience', [
            'options' => $this->search
                ? WorkExperience::where('name', 'like', '%' . $this->search . '%')->orderBy('name')->paginate(5)
                : WorkExperience::orderBy('name')->paginate(5)
        ]);
    }
}
