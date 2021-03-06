<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\JobPosition;
use App\Models\Province;
use App\Models\TypeOfWork;
use App\Models\User;
use App\Models\JobVacancy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobVacanciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobVacancies = [
            [
                'title' => 'Backend Developer',
                'description' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet nemo aspernatur possimus doloribus reiciendis! Ullam accusantium a, ratione quas nostrum nemo ad iure officia necessitatibus dolorum inventore nam perspiciatis aut veniam minima tenetur ipsum ipsam assumenda iusto enim amet laudantium sapiente aperiam odit. Animi, accusantium consequatur! Tempore nam aspernatur voluptas.</p>',
                'type_of_work_id' => 1,
                'work_experience_id' => 1,
                'job_position_id' => 1,
                'created_by' => 3,
                'country_id' => 1,
                'province_id' => 11,
                'city_id' => 159
            ],
            [
                'title' => 'Frontend Developer',
                'description' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet nemo aspernatur possimus doloribus reiciendis! Ullam accusantium a, ratione quas nostrum nemo ad iure officia necessitatibus dolorum inventore nam perspiciatis aut veniam minima tenetur ipsum ipsam assumenda iusto enim amet laudantium sapiente aperiam odit. Animi, accusantium consequatur! Tempore nam aspernatur voluptas.</p>',
                'type_of_work_id' => 1,
                'work_experience_id' => 1,
                'job_position_id' => 1,
                'created_by' => 3,
                'country_id' => 1,
                'province_id' => 11,
                'city_id' => 159
            ],
            [
                'title' => 'Quality Assurance',
                'description' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Amet nemo aspernatur possimus doloribus reiciendis! Ullam accusantium a, ratione quas nostrum nemo ad iure officia necessitatibus dolorum inventore nam perspiciatis aut veniam minima tenetur ipsum ipsam assumenda iusto enim amet laudantium sapiente aperiam odit. Animi, accusantium consequatur! Tempore nam aspernatur voluptas.</p>',
                'type_of_work_id' => 1,
                'work_experience_id' => 1,
                'job_position_id' => 1,
                'created_by' => 3,
                'country_id' => 1,
                'province_id' => 11,
                'city_id' => 159
            ]
        ];

        foreach ($jobVacancies as $key => $value) {
            $user = User::find($value['created_by']);
            $typeOfWork = TypeOfWork::find($value['type_of_work_id']);
            $jobPosition = JobPosition::find($value['job_position_id']);
            $country = Country::find($value['country_id']);
            $province = Province::find($value['province_id']);
            $city = City::find($value['city_id']);

            $value['slug'] = Str::slug(
                "{$user->name} {$typeOfWork->name} {$jobPosition->name} {$value['title']} {$country->name} {$province->name} {$city->name}"
            );
            JobVacancy::create($value);
        }
    }
}
