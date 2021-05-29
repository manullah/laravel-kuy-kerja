<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Http\Traits\JobPositionTrait;
use App\Http\Traits\JobVacancyTrait;
use App\Http\Traits\Livewire\BaseAdminPageTrait;
use App\Http\Traits\Livewire\JobVacanciesSearchDropdownTrait;
use App\Http\Traits\TypeOfWorkTrait;
use App\Http\Traits\WorkExperienceTrait;
use App\Models\City;
use App\Models\Country;
use App\Models\JobVacancy;
use App\Models\Province;
use Illuminate\Support\Str;
use Livewire\Component;

class JobVacancies extends Component
{
    use BaseAdminPageTrait, JobVacanciesSearchDropdownTrait;
    use JobVacancyTrait, TypeOfWorkTrait, WorkExperienceTrait, JobPositionTrait {
        JobVacancyTrait::validator insteadof TypeOfWorkTrait, WorkExperienceTrait, JobPositionTrait;
        JobVacancyTrait::store insteadof TypeOfWorkTrait, WorkExperienceTrait, JobPositionTrait;
        JobVacancyTrait::update insteadof TypeOfWorkTrait, WorkExperienceTrait, JobPositionTrait;
        JobVacancyTrait::destroy insteadof TypeOfWorkTrait, WorkExperienceTrait, JobPositionTrait;
        JobVacancyTrait::updateOrCreate insteadof TypeOfWorkTrait, WorkExperienceTrait, JobPositionTrait;

        TypeOfWorkTrait::validator as validatorTypeOfWork;
        TypeOfWorkTrait::store as storeTypeOfWork;
        TypeOfWorkTrait::update as updateTypeOfWork;
        TypeOfWorkTrait::destroy as destroyTypeOfWork;
        TypeOfWorkTrait::updateOrCreate as updateOrCreateTypeOfWork;

        WorkExperienceTrait::validator as validatorWorkExperience;
        WorkExperienceTrait::store as storeWorkExperience;
        WorkExperienceTrait::update as updateWorkExperience;
        WorkExperienceTrait::destroy as destroyWorkExperience;
        WorkExperienceTrait::updateOrCreate as updateOrCreateWorkExperience;

        JobPositionTrait::validator as validatorJobPositionTrait;
        JobPositionTrait::store as storeJobPositionTrait;
        JobPositionTrait::update as updateJobPositionTrait;
        JobPositionTrait::destroy as destroyJobPositionTrait;
        JobPositionTrait::updateOrCreate as updateOrCreateJobPosition;
    }

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'title' => null,
        'type_of_work' => null,
        'work_experience' => null,
        'job_position' => null,
        'created_by' => null,
        'description' => null,
        'additional_information' => null,
        'country' => null,
        'province' => null,
        'city' => null
    ];

    public $stringSearchDropdown = [
        'type_of_work' => null,
        'work_experience' => null,
        'job_position' => null,
        'created_by' => null
    ];

    public $jobVacancySlug = null;

    protected $listeners = [
        'chooseTypeOfWork',
        'changeTypeOfWork',
        'chooseWorkExperience',
        'changeWorkExperience',
        'chooseJobPosition',
        'changeJobPosition',
        'chooseCreatedBy',
        'changeCreatedBy',
        'changedIsStore'
    ];

    public function changedIsStore()
    {
        $this->resetState();
    }

    public function resetState()
    {
        $this->reset(['state', 'stringSearchDropdown']);
        $this->emit('emitSearchTypeOfWork', '');
        $this->emit('emitSearchWorkExperience', '');
        $this->emit('emitSearchJobPosition', '');
        $this->emit('emitSearchCreatedBy', '');
        $this->dispatchBrowserEvent('dispatchTinymCe', '');
    }

    public function triggerShow($slug)
    {
        $jobVacancy = JobVacancy::find($slug);

        $this->isStore = false;
        $this->jobVacancySlug = $jobVacancy->slug;

        $this->fill([
            'state' => [
                'title' => $jobVacancy->title,
                'type_of_work' => $jobVacancy->type_of_work_id,
                'work_experience' => $jobVacancy->work_experience_id,
                'job_position' => $jobVacancy->job_position_id,
                'created_by' => $jobVacancy->created_by,
                'description' => $jobVacancy->description,
                'additional_information' => $jobVacancy->additional_information,
                'country' => $jobVacancy->country_id,
                'province' => $jobVacancy->province_id,
                'city' => $jobVacancy->city_id
            ],
            'stringSearchDropdown' => [
                'type_of_work' => $jobVacancy->typeOfWork->name,
                'work_experience' => $jobVacancy->workExperience->name,
                'job_position' => $jobVacancy->jobPosition->name,
                'created_by' => $jobVacancy->createdBy->name
            ]
        ]);

        $this->emit('emitSearchTypeOfWork', $jobVacancy->typeOfWork->name);
        $this->emit('emitSearchWorkExperience', $jobVacancy->typeOfWork->name);
        $this->emit('emitSearchJobPosition', $jobVacancy->jobPosition->name);
        $this->emit('emitSearchCreatedBy', $jobVacancy->createdBy->name);

        $this->dispatchBrowserEvent('dispatchTinymCe', $jobVacancy->description);
    }

    public function triggerStore()
    {
        if (!$this->state['type_of_work']) {
            $typeOfWork = $this->updateOrCreateTypeOfWork(
                ['slug' => Str::slug($this->stringSearchDropdown['type_of_work'])],
                ['name' => $this->stringSearchDropdown['type_of_work']],
                ['name' => 'type_of_work']
            );
            $this->state['type_of_work'] = $typeOfWork['id'];
        }

        if (!$this->state['work_experience']) {
            $workExperience = $this->updateOrCreateWorkExperience(
                ['slug' => Str::slug($this->stringSearchDropdown['work_experience'])],
                ['name' => $this->stringSearchDropdown['work_experience']],
                ['name' => 'work_experience']
            );
            $this->state['work_experience'] = $workExperience['id'];
        }

        if (!$this->state['job_position']) {
            $jobPosition = $this->updateOrCreateJobPosition(
                ['slug' => Str::slug($this->stringSearchDropdown['job_position'])],
                ['name' => $this->stringSearchDropdown['job_position']],
                ['name' => 'job_position']
            );
            $this->state['job_position'] = $jobPosition['id'];
        }

        $jobVacancy = $this->store($this->state);

        $this->resetState();

        session()->flash('message', 'Job Vacancy ' . $jobVacancy['title'] . ' was stored!');
    }

    public function triggerUpdate()
    {
        $jobVacancy = $this->update($this->state, $this->jobVacancySlug);

        $this->resetState();
        $this->reset(['isStore']);

        session()->flash('message', 'Job Vacancy ' . $jobVacancy['name'] . ' was updated!');
    }

    public function triggerDestroy($id)
    {
        $jobVacancy = $this->destroy($id);

        session()->flash('message', 'Job Vacancy ' . $jobVacancy['name'] . ' was deleted!');
    }

    public function render()
    {
        return view('livewire.pages.admin.job-vacancies', [
                'countries' => Country::orderBy('name')->get()->transform(function ($item, $key) {
                    return (object) [
                        'name' => $item->name,
                        'value' => $item->id,
                    ];
                }),
                'provinces' => Province::where('country_id', $this->state['country'])->orderBy('name')->get()->transform(function ($item) {
                    return (object) [
                        'name' => $item->name,
                        'value' => $item->id,
                    ];
                }),
                'cities' => City::where('province_id', $this->state['province'])->orderBy('name')->get()->transform(function ($item) {
                    return (object) [
                        'name' => $item->name,
                        'value' => $item->id,
                    ];
                }),
                'jobVacancies' => $this->search
                    ? JobVacancy::query()
                        ->latest()
                        ->filter(['search' => $this->search])
                        ->paginate($this->paginate)
                    : JobVacancy::latest()->paginate($this->paginate)
            ])
            ->layout('layouts.admin');
    }
}
