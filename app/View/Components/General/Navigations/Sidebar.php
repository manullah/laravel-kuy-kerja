<?php

namespace App\View\Components\General\Navigations;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menus = [
            (object) [
                'show' => true,
                'title' => 'Beranda',
                'href' => 'index',
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>',
                'actived' => request()->routeIs('index')
            ],
            (object) [
                'show' => Auth::user(),
                'title' => 'Profil',
                'href' => 'profile.show',
                'icon' => '<svg aria-hidden="true" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                    </path>
                </svg>',
                'actived' => request()->routeIs('profile.*')
            ],
            (object) [
                'show' => Auth::user() && Auth::user()->isRecruiter(),
                'title' => 'Buka Lowongan',
                'href' => 'manage-job-vacancies.index',
                'icon' => '<svg class="w-5 h-5" aria-hidden="true" fill="none"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                    </path>
                </svg>',
                'actived' => request()->routeIs('manage-job-vacancies.*')
            ]
        ];

        return view('components.general.navigations.sidebar', [
            'title' => 'Kuy Kerja',
            'menus' => $menus
        ]);
    }
}
