<?php

namespace App\Http\Traits\Livewire;

use Livewire\WithPagination;

trait BaseAdminPageTrait
{
    use WithPagination;

    public $isStore = true;

    public $search = '';

    public $paginate = 10;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedIsStore($value)
    {
        if ($this->isStore) {
            $this->reset(['state']);
            $this->emit('changedIsStore');
        }
    }
}
