<?php

namespace App\Http\Livewire\Pages\JobVacancies;

use App\Models\JobVacancy;
use App\Models\JobVacancyUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{
    public $slug;

    public $jobVacancy;

    public $securityApply;

    public $securityWording = 'Saya ingin melamar';

    public function mount()
    {
        $this->jobVacancy = JobVacancy::find($this->slug);
    }

    public function applyNow()
    {
        if ($this->securityApply == $this->securityWording) {
            $JobVacancyUser = JobVacancyUser::where('job_vacancy_id', $this->jobVacancy->id)
                    ->where('user_id', Auth::user()->id)
                    ->first();

            if ($JobVacancyUser) {
                session()->flash('error', 'Anda telah melamar pekerjaan ini!');
            } else {
                JobVacancyUser::create([
                    'job_vacancy_id' => $this->jobVacancy->id,
                    'user_id' => Auth::user()->id,
                    'status' => 'PENDING'
                ]);

                session()->flash('success', "Anda telah berhasil melamar!, {$this->jobVacancy->createdBy->name} akan segera menginformasi anda untuk tahap selanjutnya");
            }
        }
    }

    public function render()
    {
        return view('livewire.pages.job-vacancies.show')
            ->layout('layouts.app', [
                'breadcrumbs' => [
                    (object) [
                        'href' => route('job-vacancies.index'),
                        'name' => 'Cari Lowongan'
                    ],
                    (object) [
                        'href' => '#',
                        'name' => "{$this->jobVacancy->createdBy->name} - {$this->jobVacancy->title}"
                    ],
                ]
            ]);
    }
}
