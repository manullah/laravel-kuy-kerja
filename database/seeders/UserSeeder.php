<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
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
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('rahasia123'),
            'role_id' => 1
        ]);
        UserDetail::create([
            'user_id' => $admin->id
        ]);

        $searcher = User::create([
            'name' => 'Searcher',
            'email' => 'searcher@searcher.com',
            'password' => Hash::make('rahasia123'),
            'role_id' => 2
        ]);
        UserDetail::create([
            'user_id' => $searcher->id
        ]);

        $recruiter = User::create([
            'name' => 'Recruiter',
            'email' => 'recruiter@recruiter.com',
            'password' => Hash::make('rahasia123'),
            'role_id' => 3
        ]);
        UserDetail::create([
            'user_id' => $recruiter->id
        ]);
    }
}
