<?php

namespace App\Http\Livewire\Pages\ManageJobApplications;

use App\Http\Traits\JobVacancyUserTrait;
use App\Models\JobVacancyUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use JobVacancyUserTrait,
        WithPagination;

    public $paginate = 10;

    public function triggerDestroy($id)
    {
        $jobVacancyUser = $this->destroy($id);

        // dd($jobVacancyUser);
        session()->flash('message', 'Job Vacancy ' . $jobVacancyUser['name'] . ' was deleted!');
    }

    public function render()
    {
        return view('livewire.pages.manage-job-applications.index', [
                'myJobApplications' => JobVacancyUser::where('user_id', Auth::user()->id)
                    ->paginate($this->paginate)
            ])
            ->layout('layouts.app', [
                'breadcrumbs' => [
                    (object) [
                        'href' => '#',
                        'name' => 'Kelola Lamaran Pekerjaan'
                    ]
                ]
            ]);
    }
}
