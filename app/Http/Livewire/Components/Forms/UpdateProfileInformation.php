<?php

namespace App\Http\Livewire\Components\Forms;

use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Province;
use App\Models\UserDetail;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateProfileInformation extends Component
{
    use WithFileUploads;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $photo;

    /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $cv;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state = array_merge(Auth::user()->withoutRelations()->toArray(), Auth::user()->userDetail->toArray());
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserProfileInformation  $updater
     * @return void
     */
    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            Auth::user(),
            array_merge(
                $this->state,
                $this->photo ? ['photo' => $this->photo] : [],
                $this->cv ? ['cv' => $this->cv] : []
            )
        );

        if (isset($this->photo) || isset($this->cv)) {
            return redirect()->route('profile.show');
        }

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Delete user's profile cv.
     *
     * @return void
     */
    public function deleteProfileCv()
    {
        Storage::disk('public')->delete($this->state['searcher_cv_path']);

        UserDetail::where('user_id', $this->state['id'])
            ->update(['searcher_cv_path' => null]);

        $this->emit('refresh-navigation-menu');
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {
        return view('livewire.components.forms.update-profile-information', [
            'countries' => Country::orderBy('name')->get()->transform(function ($item, $key) {
                return (object) [
                    'name' => $item->name,
                    'value' => $item->id,
                ];
            }),
            'provinces' => Province::where('country_id', $this->state['country_id'])->orderBy('name')->get()->transform(function ($item) {
                return (object) [
                    'name' => $item->name,
                    'value' => $item->id,
                ];
            }),
            'cities' => City::where('province_id', $this->state['province_id'])->orderBy('name')->get()->transform(function ($item) {
                return (object) [
                    'name' => $item->name,
                    'value' => $item->id,
                ];
            }),
            'districts' => District::where('city_id', $this->state['city_id'])->orderBy('name')->get()->transform(function ($item) {
                return (object) [
                    'name' => $item->name,
                    'value' => $item->id,
                ];
            }),
            'villages' => Village::where('district_id', $this->state['district_id'])->orderBy('name')->get()->transform(function ($item) {
                return (object) [
                    'name' => $item->name,
                    'value' => $item->id,
                ];
            }),
        ]);
    }
}
