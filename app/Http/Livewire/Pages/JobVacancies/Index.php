<?php

namespace App\Http\Livewire\Pages\JobVacancies;

use App\Models\City;
use App\Models\Country;
use App\Models\JobPosition;
use App\Models\JobVacancy;
use App\Models\Province;
use App\Models\TypeOfWork;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $filters = [
        'search' => null,
        'typeOfWorks' => [],
        'workExperiences' => [],
        'jobPositions' => [],
        'country' => null,
        'province' => null,
        'city' => null
    ];

    public $queryParams = [];

    public function mount(Request $request)
    {
        $this->queryParams = $request->all();
        $this->filters = [
            'search' => $request->search,
            'typeOfWorks' => $request->typeofworks ? explode(':', $request->typeofworks) : [],
            'workExperiences' => $request->workexperiences ? explode(':', $request->workexperiences) : [],
            'jobPositions' => $request->jobpositions ? explode(':', $request->jobpositions) : [],
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
        ];
    }

    public function saveFilter()
    {
        redirect(
            route('job-vacancies.index', [
                'search' => $this->filters['search'] ? $this->filters['search'] : null,
                'typeofworks' => count($this->filters['typeOfWorks']) ? collect($this->filters['typeOfWorks'])->join(':') : null,
                'workexperiences' => count($this->filters['workExperiences']) ? collect($this->filters['workExperiences'])->join(':') : null,
                'jobpositions' => count($this->filters['jobPositions']) ? collect($this->filters['jobPositions'])->join(':') : null,
                'country' => $this->filters['country'],
                'province' => $this->filters['province'],
                'city' => $this->filters['city'],
            ])
        );
    }

    public function render()
    {
        return view('livewire.pages.job-vacancies.index', [
                'jobVacancies' => JobVacancy::query()
                    ->latest()
                    ->filter($this->queryParams)
                    ->paginate(10),
                'typeOfWorks' => TypeOfWork::get(),
                'workExperiences' => WorkExperience::get(),
                'jobPositions' => JobPosition::get(),
                'countries' => Country::orderBy('name')->get(),
                'provinces' => $this->filters['country']
                    ? Province::where('country_id', $this->filters['country'])->orderBy('name')->get()
                    : Province::orderBy('name')->get(),
                'cities' => $this->filters['province']
                    ? City::where('province_id', $this->filters['province'])->orderBy('name')->get()
                    : City::orderBy('name')->get(),
            ])
            ->layout('layouts.app', [
                'breadcrumbs' => [
                    (object) [
                        'href' => '#',
                        'name' => 'Cari Lowongan'
                    ]
                ]
            ]);
    }
}
