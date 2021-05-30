<?php

namespace App\View\Components\General\Navigations;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Navbar extends Component
{
    public $breadcrumbs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.general.navigations.navbar', [
            'menus' => [
                (object) [
                    'show' => true,
                    'title' => 'Cari Kerja',
                    'href' => route('job-vacancies.index'),
                    'actived' => request()->routeIs('job-vacancies.*')
                ],
                (object) [
                    'show' => Auth::user(),
                    'title' => 'Profil',
                    'href' => route('profile.show'),
                    'actived' => request()->routeIs('profile.*')
                ],
                (object) [
                    'show' => Auth::user() && Auth::user()->isSearcher(),
                    'title' => 'Lamaran Pekerjaan',
                    'href' => "route('job-application.')",
                    'actived' => request()->routeIs('job-application.*')
                ],
                (object) [
                    'show' => Auth::user() && Auth::user()->isRecruiter(),
                    'title' => 'Kelola Lowongan',
                    'href' => route('manage-job-vacancies.index'),
                    'actived' => request()->routeIs('manage-job-vacancies.*')
                ]
            ]
        ]);
    }
}
