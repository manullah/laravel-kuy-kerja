<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Http\Traits\BaseAdminLivewireTrait;
use App\Http\Traits\TypeOfWorksTrait;
use App\Models\TypeOfWork;
use Livewire\Component;

class TypeOfWorks extends Component
{
    use BaseAdminLivewireTrait;
    use TypeOfWorksTrait;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'name' => '',
        'slug' => ''
    ];

    public $typeOfWorkId = null;

    public function showTOW($id)
    {
        $typeOfWork = TypeOfWork::find($id);

        $this->isStore = false;
        $this->typeOfWorkId = $typeOfWork->id;

        $this->fill(['state' => [
            'name' => $typeOfWork->name,
            'slug' => $typeOfWork->slug
        ]]);
    }

    public function storeTOW()
    {
        $typeOfWork = $this->store($this->state);

        $this->reset(['state']);

        session()->flash('message', 'Type fo Work ' . $typeOfWork['name'] . ' was stored!');
    }

    public function updateTOW()
    {
        $typeOfWork = $this->update($this->state, $this->typeOfWorkId);

        $this->reset(['state']);

        session()->flash('message', 'Type fo Work ' . $typeOfWork['name'] . ' was updated!');
    }

    public function destroyTOW($id)
    {
        $typeOfWork = $this->destroy($id);

        session()->flash('message', 'Type fo Work ' . $typeOfWork['name'] . ' was deleted!');
    }

    public function render()
    {
        return view('livewire.pages.admin.type-of-works', [
            'typeOfWorks' => $this->search == null
                ? TypeOfWork::latest()->paginate($this->paginate)
                : TypeOfWork::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }
}
