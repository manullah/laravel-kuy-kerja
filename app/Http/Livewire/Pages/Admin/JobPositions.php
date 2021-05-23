<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Http\Traits\BaseAdminLivewireTrait;
use App\Http\Traits\JobPositionTrait;
use App\Models\JobPosition;
use Livewire\Component;

class JobPositions extends Component
{
    use BaseAdminLivewireTrait;
    use JobPositionTrait;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'name' => null,
    ];

    public $jobPositionId = null;

    public function showJP($id)
    {
        $jobPosition = JobPosition::find($id);

        $this->isStore = false;
        $this->jobPositionId = $jobPosition->id;

        $this->fill(['state' => [
            'name' => $jobPosition->name,
        ]]);
    }

    public function storeJP()
    {
        $jobPosition = $this->store($this->state);

        $this->reset(['state']);

        session()->flash('message', 'Job Position ' . $jobPosition['name'] . ' was stored!');
    }

    public function updateJP()
    {
        $jobPosition = $this->update($this->state, $this->jobPositionId);

        $this->reset(['state']);

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
