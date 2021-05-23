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
                'icon' => '',
                'actived' => request()->routeIs('admin.index')
            ],
            // (object) [
            //     'show' => Gate::allows('manage.users'),
            //     'title' => 'Users',
            //     'href' => route('admin.users.index'),
            //     'icon' => '',
            //     'actived' => request()->routeIs('admin.users.*')
            // ],
            (object) [
                'show' => Gate::allows('manage.job-positions'),
                'title' => 'Job Positions',
                'href' => route('admin.job-positions.index'),
                'icon' => '',
                'actived' => request()->routeIs('admin.job-positions.*')
            ],
            (object) [
                'show' => Gate::allows('manage.type-of-works'),
                'title' => 'Type of Works',
                'href' => route('admin.type-of-works.index'),
                'icon' => '',
                'actived' => request()->routeIs('admin.type-of-works.*')
            ]
        ];

        return view('components.admin.navigations.sidebar', [
            'title' => 'Kuy Kerja',
            'menus' => $menus
        ]);
    }
}
