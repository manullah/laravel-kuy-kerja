<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Features as FortifyFeatures;
use Laravel\Jetstream\Features as JetstreamFeatures;
use Livewire\Component;

class Profile extends Component
{
    public $sectionTab = 1;

    public $auth;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->auth = array_merge(Auth::user()->withoutRelations()->toArray(), Auth::user()->userDetail->toArray());
    }

    public function changeTab($tab)
    {
        $this->sectionTab = $tab;
    }

    public function render()
    {
        $tabs = [
            (object) [
                'id' => 1,
                'show' => FortifyFeatures::canUpdateProfileInformation(),
                'title' => 'Profile Information',
                'actived' => $this->sectionTab == 1
            ],
            (object) [
                'id' => 2,
                'show' => FortifyFeatures::enabled(FortifyFeatures::updatePasswords()),
                'title' => 'Update Password',
                'actived' => $this->sectionTab == 2
            ],
            (object) [
                'id' => 3,
                'show' => FortifyFeatures::canManageTwoFactorAuthentication(),
                'title' => 'Two Factor Authentication',
                'actived' => $this->sectionTab == 3
            ],
            (object) [
                'id' => 4,
                'show' => false,
                'title' => 'Browser Session',
                'actived' => $this->sectionTab == 4
            ],
            (object) [
                'id' => 5,
                'show' => JetstreamFeatures::hasAccountDeletionFeatures(),
                'title' => 'Delete Account',
                'actived' => $this->sectionTab == 5
            ],
        ];

        return view('livewire.pages.profile', [
                'tabs' => $tabs,
            ])
            ->layout('layouts.app', [
                'breadcrumbs' => [
                    (object) [
                        'href' => route('profile.show'),
                        'name' => 'Profile'
                    ]
                ]
            ]);
    }
}
