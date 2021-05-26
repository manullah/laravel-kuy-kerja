<?php

namespace App\Http\Traits;

use App\Models\JobPosition;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

trait JobPositionTrait
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
            'name' => 'required|unique:job_positions'
        ])->validate();

        $jobPosition = JobPosition::create([
            'name' => ucwords($data['name']),
            'slug' => Str::slug($data['name'])
        ]);

        return $jobPosition;
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
            'name' => ['required', Rule::unique('job_positions')->ignore($id)]
        ])->validate();

        $jobPosition = JobPosition::findOrFail($id);
        $jobPosition->update([
            'name' => ucwords($data['name']),
            'slug' => Str::slug($data['name'])
        ]);

        return $jobPosition;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobPosition = JobPosition::findOrFail($id);
        $jobPosition->delete();

        return $jobPosition;
    }

    public function updateOrCreate($condition, array $data, array $validatorName = [])
    {
        $this->validator($data, $validatorName);

        $jobPosition = JobPosition::updateOrCreate(
            $condition,
            [
                'name' => ucwords($data['name']),
                'slug' => Str::slug($data['name'])
            ]
        );

        return $jobPosition;
    }
}

