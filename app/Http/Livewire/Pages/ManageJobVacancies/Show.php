<?php

namespace App\Http\Livewire\Pages\ManageJobVacancies;

use App\Models\JobVacancy;
use Livewire\Component;

class Show extends Component
{
    public $slug;

    public $jobVacancy;

    public function mount()
    {
        $this->jobVacancy = JobVacancy::find($this->slug);
    }

    public function render()
    {
        return view('livewire.pages.manage-job-vacancies.show')
            ->layout('layouts.app', [
                'breadcrumbs' => [
                    (object) [
                        'href' => route('manage-job-vacancies.index'),
                        'name' => 'Kelola Lowongan'
                    ],
                    (object) [
                        'href' => route('manage-job-vacancies.show', $this->slug),
                        'name' => $this->jobVacancy->title
                    ],
                ]
            ]);
    }
}
