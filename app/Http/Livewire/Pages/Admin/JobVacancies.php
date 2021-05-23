<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Http\Traits\BaseAdminLivewireTrait;
use Livewire\Component;

class JobVacancies extends Component
{
    use BaseAdminLivewireTrait;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'title' => null,
        'description' => null,
        'additional_information' => null,
        'type_of_work_id' => null,
        'work_experience_id' => null,
        'job_position_id' => null,
        'created_by' => null
    ];

    public $jobVacancyId = null;

    public function render()
    {
        return view('livewire.pages.admin.job-vacancies');
    }
}
