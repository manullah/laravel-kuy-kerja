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
        $workExperiences = [
            'First Graduate',
            '1 Tahun',
            '2 Tahun',
            '3 Tahun',
            '4 Tahun'
        ];

        foreach ($workExperiences as $key => $value) {
            WorkExperience::create([
                'name' => $value,
                'slug' => Str::slug($value, '-')
            ]);
        }
    }
}
