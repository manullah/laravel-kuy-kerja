<?php

namespace App\Http\Traits;

use App\Models\JobPosition;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

trait JobPositionTrait
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
            'name' => 'required|unique:job_positions'
        ])->validate();

        $jobPosition = JobPosition::create([
            'name' => $data['name'],
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
            'name' => $data['name'],
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
}

