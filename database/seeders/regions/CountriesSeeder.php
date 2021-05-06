<?php

namespace Database\Seeders\Regions;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::insert([
            [
                'name'              => 'Indonesia',
                'country_code'      => '+62',
                'description'       => 'Indonesia Country',
            ]
        ]);
    }
}
