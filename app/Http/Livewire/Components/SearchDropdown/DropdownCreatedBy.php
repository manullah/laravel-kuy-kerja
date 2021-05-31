<?php

namespace App\Http\Livewire\Components\SearchDropdown;

use App\Models\User;
use Livewire\Component;

class DropdownCreatedBy extends Component
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
            $options = User::where('name', 'like', '%' . $this->search . '%')
                    ->where('role_id', 3)
                    ->orderBy('name')
                    ->paginate(10);
        }

        return view('livewire.components.search-dropdown.dropdown-created-by', [
            'options' => $this->search
                ? $options
                : []
        ]);
    }
}
