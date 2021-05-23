<?php

namespace App\Http\Traits;

use Livewire\WithPagination;

trait BaseAdminLivewireTrait
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

    // public function updateState(string $name, string $slug)
    // {
    //     $this->state = [
    //         'name' => $name,
    //         'slug' => $slug
    //     ];
    // }

    public function changeFormAction()
    {
        $this->isStore = !$this->isStore;
        if ($this->isStore) {
            $this->reset(['state']);
        }
    }
}
