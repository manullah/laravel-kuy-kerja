<?php

namespace App\Http\Livewire\Pages\ManageJobVacancies;

use App\Models\JobVacancy;
use App\Models\JobVacancyUser;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    public $paginate = 10;

    public $slug;

    public $jobVacancy;

    public function mount()
    {
        $this->jobVacancy = JobVacancy::find($this->slug);
    }

    public function render()
    {
        return view('livewire.pages.manage-job-vacancies.show', [
                'jobApplications' => JobVacancyUser::get()
            ])
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
