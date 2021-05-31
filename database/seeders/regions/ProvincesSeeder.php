<?php

namespace Database\Seeders\Regions;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = (array) json_decode(file_get_contents(storage_path()."/json/provinces.json", true));

        foreach ($provinces['provinces'] as $key => $value) {
            Province::create([
                'id' => $value->id,
                'name' => $value->name,
                'country_id' => $value->country_id,
            ]);
        }
    }
}
