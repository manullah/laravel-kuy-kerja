<?php

namespace App\Http\Livewire\Pages;

use App\Models\JobVacancy;
use Livewire\Component;

class ManageJobVacanciesShow extends Component
{
    public $slug;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.pages.manage-job-vacancies-show', [
            'jobVacancy' => JobVacancy::find($this->slug)
        ]);
    }
}
