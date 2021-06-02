<?php

namespace App\Http\Livewire\Pages;

use App\Models\City;
use App\Models\JobVacancy;
use Livewire\Component;

class Index extends Component
{
    public $filters = [
        'search' => null,
        'city' => null,
        'typeOfWork' => null
    ];

    public $stringSearchDropdown = [
        'city' => null,
        'typeOfWork' => null
    ];

    protected $listeners = [
        'chooseTypeOfWork',
        'changeTypeOfWork',
        'chooseCity',
        'changeCity',
    ];

    public function chooseTypeOfWork($option)
    {
        $this->filters['typeOfWork'] = $option['id'];
        $this->stringSearchDropdown['typeOfWork'] = $option['name'];

        $this->emit('emitSearchTypeOfWork', $option['name']);
    }

    public function changeTypeOfWork($value)
    {
        $this->filters['typeOfWork'] = null;
        $this->stringSearchDropdown['typeOfWork'] = $value;
    }

    public function chooseCity($option)
    {
        $this->filters['city'] = $option['id'];
        $this->stringSearchDropdown['city'] = $option['name'];

        $this->emit('emitSearchCity', $option['name']);
    }

    public function changeCity($value)
    {
        $this->filters['city'] = null;
        $this->stringSearchDropdown['city'] = $value;
    }

    public function searchJobVacancies()
    {
        // dd($this->filters);
        redirect(
            route('job-vacancies.index', [
                'search' => $this->filters['search'] ? $this->filters['search'] : null,
                'typeofworks' => $this->filters['typeOfWork'],
                'city' => $this->filters['city'],
            ])
        );
    }

    public function render()
    {
        return view('livewire.pages.index', [
                'jobVacancies' => JobVacancy::get(),
                'cities' => City::get()
            ])
            ->layout('layouts.app', [
                'breadcrumbs' => []
            ]);
    }
}
