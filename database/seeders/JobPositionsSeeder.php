<?php

namespace Database\Seeders;

use App\Models\JobPosition;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobPosition = [
            'Manager',
        ];

        foreach ($jobPosition as $key => $value) {
            JobPosition::create([
                'name' => $value,
                'slug' => Str::slug($value, '-')
            ]);
        }
    }
}
