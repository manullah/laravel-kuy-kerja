<?php

namespace App\Http\Livewire\Pages;

use App\Models\City;
use App\Models\JobVacancy;
use Livewire\Component;

class Index extends Component
{
    public $search;

    public function applyJobVacancy($slug)
    {
        dd($slug);
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
