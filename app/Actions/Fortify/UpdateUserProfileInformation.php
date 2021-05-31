<?php

namespace App\Actions\Fortify;

use App\Models\UserDetail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    private $user = null;

    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'country_id' => ['required'],
            'province_id' => ['required'],
            'city_id' => ['required'],
            'district_id' => ['required'],
            'village_id' => ['required'],
            'address' => ['required'],
            'cv' => ['nullable', 'mimes:pdf', 'max:4096'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (isset($input['cv'])) {
            $this->saveCvSearcher($user, $input['cv']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $this->updateDataProfile($user, $input);
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $this->updateDataProfile($user, $input, true);

        $user->sendEmailVerificationNotification();
    }

    /**
     * Update data profile
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    protected function updateDataProfile($user, array $input, $isUpdateEmail = false)
    {
        $updateUser = [
            'name' => $input['name'],
            'email' => $input['email'],
        ];
        if ($isUpdateEmail) $updateUser['email_verified_at'] = null;
        $user->forceFill($updateUser)->save();

        UserDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'phone' => $input['phone'],
                'country_id' => $input['country_id'],
                'province_id' => $input['province_id'],
                'city_id' => $input['city_id'],
                'district_id' => $input['district_id'],
                'village_id' => $input['village_id'],
                'address' => $input['address'],
            ]
        );
    }

    /**
     * Save cv searcher
     *
     * @param mixed $user
     * @param array $input
     * @return void
     */
    protected function saveCvSearcher($user, UploadedFile $cv)
    {
        $this->user = $user;
        tap($this->user->userDetail->searcher_cv_path, function ($previous) use ($cv) {
            UserDetail::updateOrCreate(
                ['user_id' => $this->user->id],
                [
                    'searcher_cv_path' => $cv->storePublicly(
                        'searcher-cv', ['disk' => 'public']
                    )
                ]
            );

            if ($previous) {
                Storage::disk('public')->delete($previous);
            }
        });
    }
}
