<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Http\Traits\Livewire\BaseAdminPageTrait;
use App\Http\Traits\JobPositionTrait;
use App\Models\JobPosition;
use Livewire\Component;

class JobPositions extends Component
{
    use BaseAdminPageTrait;
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

    public function triggerShow($id)
    {
        $jobPosition = JobPosition::find($id);

        $this->isStore = false;
        $this->jobPositionId = $jobPosition->id;

        $this->fill(['state' => [
            'name' => $jobPosition->name,
        ]]);
    }

    public function triggerStore()
    {
        $jobPosition = $this->store($this->state);

        $this->reset(['state']);

        session()->flash('message', 'Job Position ' . $jobPosition['name'] . ' was stored!');
    }

    public function triggerUpdate()
    {
        $jobPosition = $this->update($this->state, $this->jobPositionId);

        $this->reset(['state', 'isStore']);

        session()->flash('message', 'Job Position ' . $jobPosition['name'] . ' was updated!');
    }

    public function triggerDestroy($id)
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
            ])
            ->layout('layouts.admin');;
    }
}
