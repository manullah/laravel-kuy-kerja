<?php

namespace Database\Seeders\Regions;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $districts = (array) json_decode(file_get_contents(storage_path()."/json/districts.json", true));

        foreach ($districts['districts'] as $key => $value) {
            District::create([
                'id' => $value->id,
                'name' => $value->name,
                'city_id' => $value->city_id,
            ]);
        }
    }
}
