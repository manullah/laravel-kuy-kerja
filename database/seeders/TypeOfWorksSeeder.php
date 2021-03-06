<?php

namespace Database\Seeders;

use App\Models\TypeOfWork;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeOfWorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeOfWorks = [
            'Penuh Waktu',
            'Paruh Waktu',
            'Kontrak'
        ];

        foreach ($typeOfWorks as $key => $value) {
            TypeOfWork::create([
                'name' => $value,
                'slug' => Str::slug($value, '-')
            ]);
        }
    }
}
