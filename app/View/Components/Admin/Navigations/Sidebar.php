<?php

namespace App\View\Components\Admin\Navigations;

use Illuminate\Support\Facades\Gate;
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
                'title' => 'Dashboard',
                'href' => route('admin.index'),
                'icon' => '<svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>',
                'actived' => request()->routeIs('admin.index')
            ],
            // (object) [
            //     'show' => Gate::allows('manage.users'),
            //     'title' => 'Users',
            //     'href' => route('admin.users.index'),
            //     'icon' => '<svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
            //         stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            //         <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
            //         </path>
            //     </svg>',
            //     'actived' => request()->routeIs('admin.users.*')
            // ],
            (object) [
                'show' => Gate::allows('manage.job-positions'),
                'title' => 'Job Positions',
                'href' => route('admin.job-positions.index'),
                'icon' => '',
                'actived' => request()->routeIs('admin.job-positions.*')
            ]
        ];

        return view('components.admin.navigations.sidebar', [
            'title' => 'Kuy Kerja',
            'menus' => $menus
        ]);
    }
}
