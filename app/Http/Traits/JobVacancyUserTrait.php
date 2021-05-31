<?php

namespace App\Http\Traits;

use App\Models\JobVacancyUser;
use Illuminate\Support\Facades\Validator;

trait JobVacancyUserTrait
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     * @return array
     */
    public function store(array $data)
    {
        Validator::make($data, [
            'job_vacancy_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ])->validate();

        $jobVacancyUser = JobVacancyUser::create($data);

        return $jobVacancyUser;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @param  int  $id
     * @return array
     */
    public function update(array $data, $id)
    {
        Validator::make($data, [
            'job_vacancy_id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
        ])->validate();

        $jobVacancyUser = JobVacancyUser::findOrFail($id);
        $jobVacancyUser->update($data);

        return $jobVacancyUser;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return App\Models\JobVacancyUser
     */
    public function destroy($id)
    {
        $jobVacancyUser = JobVacancyUser::findOrFail($id);
        $jobVacancyUser->delete();

        return $jobVacancyUser;
    }
}

