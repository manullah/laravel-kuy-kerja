<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Http\Traits\JobPositionTrait;
use App\Models\JobPosition;
use Livewire\Component;
use Livewire\WithPagination;

class JobPositions extends Component
{
    use JobPositionTrait;
    use WithPagination;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'name' => '',
        'slug' => ''
    ];

    public $jobPositionId = null;

    public $isStore = true;

    public $search = '';

    public $paginate = 10;

    protected $updateQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateState(string $name, string $slug)
    {
        $this->state = [
            'name' => $name,
            'slug' => $slug
        ];
    }

    public function changeFormAction()
    {
        $this->isStore = !$this->isStore;
        if ($this->isStore) {
            $this->updateState('', '');
        }
    }

    public function showJP($id)
    {
        $jobPosition = JobPosition::find($id);

        $this->isStore = false;
        $this->jobPositionId = $jobPosition->id;
        $this->updateState($jobPosition->name, $jobPosition->slug);
    }

    public function storeJP()
    {
        $jobPosition = $this->store($this->state);

        $this->updateState('', '');

        session()->flash('message', 'Job Position ' . $jobPosition['name'] . ' was stored!');
    }

    public function updateJP()
    {
        $jobPosition = $this->update($this->state, $this->jobPositionId);

        $this->updateState('', '');

        session()->flash('message', 'Job Position ' . $jobPosition['name'] . ' was updated!');
    }

    public function destroyJP($id)
    {
        $jobPosition = $this->destroy($id);

        session()->flash('message', 'Job Position ' . $jobPosition['name'] . ' was deleted!');
    }

    public function render()
    {
        return view('livewire.pages.admin.job-positions', [
            'jobPositions' => $this->search == null
                ? JobPosition::latest()->paginate($this->paginate)
                : JobPosition::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }
}
