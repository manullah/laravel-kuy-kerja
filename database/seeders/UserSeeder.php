<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('rahasia123'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Searcher',
            'email' => 'searcher@searcher.com',
            'password' => Hash::make('rahasia123'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'Recruiter',
            'email' => 'recruiter@recruiter.com',
            'password' => Hash::make('rahasia123'),
            'role_id' => 3
        ]);
    }
}
