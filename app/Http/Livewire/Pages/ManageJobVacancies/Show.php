<?php

namespace App\Http\Livewire\Pages\ManageJobVacancies;

use App\Http\Traits\JobVacancyUserTrait;
use App\Models\JobVacancy;
use App\Models\JobVacancyUser;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination,
        JobVacancyUserTrait;

    public $state = [
        'job_vacancy_id' => null,
        'user_id' => null,
        'status' => null
    ];

    public $jobVacancy;

    public $modalChangeStatus = false;

    public $applicantActived;

    public function getOptionsStatusJobVacancyProperty()
    {
        return [
            (object) ['name' => 'PENDING', 'title' => 'Pending'],
            (object) ['name' => 'INTERVIEW', 'title' => 'Wawancara'],
            (object) ['name' => 'ACCEPTED', 'title' => 'Diterima']
        ];
    }

    public function mount($slug)
    {
        $this->jobVacancy = JobVacancy::find($slug);
    }

    public function triggerModalChangeStatus($idJobVacancyUser)
    {
        $this->applicantActived = JobVacancyUser::find($idJobVacancyUser);
        $this->fill([
            'state' => [
                'job_vacancy_id' => $this->applicantActived->job_vacancy_id,
                'user_id' => $this->applicantActived->user_id,
                'status' => $this->applicantActived->status
            ]
        ]);
        $this->modalChangeStatus = !$this->modalChangeStatus;
    }

    public function changeStatusApplicant()
    {
        $jobVacancyUser = $this->update($this->state, $this->applicantActived->id);

        $this->reset(['state']);
        $this->modalChangeStatus = !$this->modalChangeStatus;

        session()->flash('message', "Status {$jobVacancyUser->user->name} was updated!");
    }

    public function render()
    {
        return view('livewire.pages.manage-job-vacancies.show', [
                'userApplications' => JobVacancyUser::paginate(10),
            ])
            ->layout('layouts.app', [
                'breadcrumbs' => [
                    (object) [
                        'href' => route('manage-job-vacancies.index'),
                        'name' => 'Kelola Lowongan'
                    ],
                    (object) [
                        'href' => '#',
                        'name' => $this->jobVacancy->title
                    ],
                ]
            ]);
    }
}
