<?php

namespace Database\Seeders;

use Database\Seeders\Regions\CitiesSeeder;
use Database\Seeders\Regions\CountriesSeeder;
use Database\Seeders\Regions\ProvincesSeeder;
use Database\Seeders\Regions\DistrictsSeeder;
use Database\Seeders\Regions\VillagesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CountriesSeeder::class,
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
            TypeOfWorksSeeder::class,
            WorkExperiencesSeeder::class,
            JobPositionsSeeder::class
        ]);
    }
}
