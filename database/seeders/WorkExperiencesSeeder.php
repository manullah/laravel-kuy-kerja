<?php

namespace Database\Seeders;

use App\Models\WorkExperience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WorkExperiencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workExperiences = ['First Graduate', '1 Year', '2 Year', '3 Year', '4 Year'];

        foreach ($workExperiences as $key => $value) {
            WorkExperience::create([
                'name' => $value,
                'slug' => Str::slug($value, '-')
            ]);
        }
    }
}
