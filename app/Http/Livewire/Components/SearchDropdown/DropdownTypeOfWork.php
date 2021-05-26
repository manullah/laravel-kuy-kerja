<?php

namespace App\Http\Livewire\Components\SearchDropdown;

use App\Models\TypeOfWork;
use Livewire\Component;

class DropdownTypeOfWork extends Component
{
    public $search;

    protected $listeners = [
        'emitSearchTypeOfWork'
    ];

    public function updatedSearch($value)
    {
        $this->emit('changeTypeOfWork', $value);
    }

    public function chooseOption($option)
    {
        $this->emit('chooseTypeOfWork', $option);
    }

    public function emitSearchTypeOfWork($search)
    {
        $this->search = $search;
    }

    public function render()
    {
        return view('livewire.components.search-dropdown.dropdown-type-of-work', [
            'options' => $this->search
                ? TypeOfWork::where('name', 'like', '%' . $this->search . '%')->orderBy('name')->paginate(5)
                : TypeOfWork::orderBy('name')->paginate(5)
        ]);
    }
}
