<?php

namespace App\Http\Traits;

use App\Models\TypeOfWork;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

trait TypeOfWorkTrait
{
    public function validator(array $data, array $validatorName = [])
    {
        if (array_key_exists('name', $validatorName)) {
            $data[$validatorName['name']] = $data['name'];
            unset($data['name']);
        }

        Validator::make($data, [
            array_key_exists('name', $validatorName) ? $validatorName['name'] : 'name' => 'required|unique:type_of_works'
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
            'name' => 'required|unique:type_of_works'
        ])->validate();

        $typeOfWork = TypeOfWork::create([
            'name' => ucwords($data['name']),
            'slug' => Str::slug($data['name'])
        ]);

        return $typeOfWork;
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
            'name' => ['required', Rule::unique('type_of_works')->ignore($id)]
        ])->validate();

        $typeOfWork = TypeOfWork::findOrFail($id);
        $typeOfWork->update([
            'name' => ucwords($data['name']),
            'slug' => Str::slug($data['name'])
        ]);

        return $typeOfWork;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeOfWork = TypeOfWork::findOrFail($id);
        $typeOfWork->delete();

        return $typeOfWork;
    }

    public function updateOrCreate($condition, array $data, array $validatorName = [])
    {
        $this->validator($data, $validatorName);

        $typeOfWork = TypeOfWork::updateOrCreate(
            $condition,
            [
                'name' => ucwords($data['name']),
                'slug' => Str::slug($data['name'])
            ]
        );

        return $typeOfWork;
    }
}

