<?php

namespace App\Http\Traits;

use App\Models\City;
use App\Models\Country;
use App\Models\JobPosition;
use App\Models\JobVacancy;
use App\Models\Province;
use App\Models\TypeOfWork;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

trait JobVacanciesTrait
{
    public function validator(array $data, array $validatorName = [])
    {
        if (array_key_exists('name', $validatorName)) {
            $data[$validatorName['name']] = $data['name'];
            unset($data['name']);
        }

        Validator::make($data, [
            array_key_exists('name', $validatorName) ? $validatorName['name'] : 'name' => 'required|unique:work_experiences'
        ])->validate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  array $data
     * @return array
     */
    public function store(array $data)
    {
        Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'type_of_work' => 'required',
            'work_experience' => 'required',
            'job_position' => 'required',
            'created_by' => 'required',
            'country' => 'required',
            'province' => 'required',
            'city' => 'required'
        ])->validate();

        $user = User::find($data['created_by']);
        $typeOfWork = TypeOfWork::find($data['type_of_work']);
        $jobPosition = JobPosition::find($data['job_position']);
        $country = Country::find($data['country']);
        $province = Province::find($data['province']);
        $city = City::find($data['city']);

        $jobVacancy = JobVacancy::create([
            'title' => $data['title'],
            'slug' => Str::slug(
                "{$user->name} {$typeOfWork->name} {$jobPosition->name} {$data['title']} {$country->name} {$province->name} {$city->name}"
            ),
            'description' => $data['description'],
            'type_of_work_id' => $data['type_of_work'],
            'work_experience_id' => $data['work_experience'],
            'job_position_id' => $data['job_position'],
            'created_by' => $data['created_by'],
            'country_id' => $data['country'],
            'province_id' => $data['province'],
            'city_id' => $data['city']
        ]);

        return $jobVacancy;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  array $data
     * @param  string  $slug
     * @return array
     */
    public function update(array $data, $slug)
    {
        Validator::make($data, [
            'title' => 'required',
            'description' => 'required',
            'type_of_work' => 'required',
            'work_experience' => 'required',
            'job_position' => 'required',
            'created_by' => 'required',
            'country' => 'required',
            'province' => 'required',
            'city' => 'required'
        ])->validate();

        $jobVacancy = JobVacancy::findOrFail($slug);
        $jobVacancy->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'type_of_work_id' => $data['type_of_work'],
            'work_experience_id' => $data['work_experience'],
            'job_position_id' => $data['job_position'],
            'created_by' => $data['created_by'],
            'country_id' => $data['country'],
            'province_id' => $data['province'],
            'city_id' => $data['city']
        ]);
        $jobVacancy->update([
            'slug' => Str::slug(
                "{$jobVacancy->createdBy->name} {$jobVacancy->typeOfWork->name} {$jobVacancy->jobPosition->name} {$data['title']} {$jobVacancy->country->name} {$jobVacancy->province->name} {$jobVacancy->city->name}"
            )
        ]);

        return $jobVacancy;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobVacancy = JobVacancy::findOrFail($id);
        $jobVacancy->delete();

        return $jobVacancy;
    }

    public function updateOrCreate($condition, array $data, array $validatorName = [])
    {
        dd($condition);
        // $this->validator($data, $validatorName);

        // $jobVacancy = JobVacancy::updateOrCreate(
        //     $condition,
        //     [
        //         'name' => $data['name'],
        //         'slug' => Str::slug($data['name'])
        //     ]
        // );

        // return $jobVacancy;
    }
}

