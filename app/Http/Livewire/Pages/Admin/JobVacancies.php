<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Http\Traits\BaseAdminLivewireTrait;
use App\Http\Traits\Livewire\JobVacanciesSearchDropdownTrait;
use App\Models\JobPosition;
use App\Models\TypeOfWork;
use App\Models\WorkExperience;
use Livewire\Component;

class JobVacancies extends Component
{
    use BaseAdminLivewireTrait;
    use JobVacanciesSearchDropdownTrait;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'title' => null,
        'description' => null,
        'additional_information' => null,
        'type_of_work' => null,
        'work_experience' => null,
        'job_position' => null,
        'created_by' => null
    ];

    public $stringSearchDropdown = [
        'type_of_work' => null,
        'work_experience' => null,
        'job_position' => null,
    ];

    public $jobVacancyId = null;

    protected $listeners = [
        'chooseTypeOfWork',
        'changeTypeOfWork'
    ];

    public function render()
    {
        return view('livewire.pages.admin.job-vacancies', [
            'typeofWorks' => [],
        ]);
    }
}
