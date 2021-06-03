<?php

/**
 * check if the user has filled in the profile.
 *
 * @param  Illuminate\Support\Facades\Auth $user
 * @return boolean
 */
function checkProfileCompleted($user)
{
    if ($user->userDetail->address && $user->userDetail->phone
        && $user->userDetail->country_id && $user->userDetail->province_id
        && $user->userDetail->city_id && $user->userDetail->district_id
        && $user->userDetail->village_id && $user->userDetail->searcher_cv_path) {
        return true;
    }

    return false;
}
