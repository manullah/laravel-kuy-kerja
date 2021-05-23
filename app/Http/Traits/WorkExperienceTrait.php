<?php

namespace App\Http\Traits;

use App\Models\WorkExperience;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

trait WorkExperienceTrait
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
            'name' => 'required|unique:work_experiences'
        ])->validate();

        $workExperience = WorkExperience::create([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);

        return $workExperience;
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
            'name' => ['required', Rule::unique('work_experiences')->ignore($id)]
        ])->validate();

        $workExperience = WorkExperience::findOrFail($id);
        $workExperience->update([
            'name' => $data['name'],
            'slug' => Str::slug($data['name'])
        ]);

        return $workExperience;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $workExperience = WorkExperience::findOrFail($id);
        $workExperience->delete();

        return $workExperience;
    }
}

