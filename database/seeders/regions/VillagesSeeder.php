<?php

namespace Database\Seeders\Regions;

use App\Models\Village;
use Illuminate\Database\Seeder;

class VillagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villages = (array) json_decode(file_get_contents(storage_path()."/json/villages.json", true));

        foreach ($villages['villages'] as $key => $value) {
            Village::create([
                'id' => $value->id,
                'name' => $value->name,
                'district_id' => $value->district_id,
            ]);
        }
    }
}
