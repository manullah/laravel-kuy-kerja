<?php

namespace Database\Seeders\Regions;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = (array) json_decode(file_get_contents(storage_path()."/json/cities.json", true));

        foreach ($cities['cities'] as $key => $value) {
            City::create([
                'id' => $value->id,
                'name' => $value->name,
                'province_id' => $value->province_id,
            ]);
        }
    }
}
