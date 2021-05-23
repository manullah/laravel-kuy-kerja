<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Http\Traits\BaseAdminLivewireTrait;
use App\Http\Traits\WorkExperienceTrait;
use App\Models\WorkExperience;
use Livewire\Component;

class WorkExperiences extends Component
{
    use BaseAdminLivewireTrait;
    use WorkExperienceTrait;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'name' => null,
    ];

    public $workExperienceId = null;

    public function showWE($id)
    {
        $workExperiences = WorkExperience::find($id);

        $this->isStore = false;
        $this->workExperienceId = $workExperiences->id;

        $this->fill(['state' => [
            'name' => $workExperiences->name,
        ]]);
    }

    public function storeWE()
    {
        $workExperiences = $this->store($this->state);

        $this->reset(['state']);

        session()->flash('message', 'Work Experience ' . $workExperiences['name'] . ' was stored!');
    }

    public function updateWE()
    {
        $workExperiences = $this->update($this->state, $this->workExperienceId);

        $this->reset(['state']);

        session()->flash('message', 'Work Experience ' . $workExperiences['name'] . ' was updated!');
    }

    public function destroyWE($id)
    {
        $workExperiences = $this->destroy($id);

        session()->flash('message', 'Work Experience ' . $workExperiences['name'] . ' was deleted!');
    }

    public function render()
    {
        return view('livewire.pages.admin.work-experiences', [
            'workExperiences' => $this->search == null
                ? WorkExperience::latest()->paginate($this->paginate)
                : WorkExperience::latest()->where('name', 'like', '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }
}
