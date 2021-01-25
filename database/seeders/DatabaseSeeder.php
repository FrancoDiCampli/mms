<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\SocialWork;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        SocialWork::create(['name' => 'Particular']);
        SocialWork::create(['name' => 'INSSSEP']);
        SocialWork::create(['name' => 'PAMI']);
        SocialWork::create(['name' => 'OSDE']);

        Patient::factory(1000)->create();

        User::create([
            'name' => 'Sys Medical',
            'email' => 'admin@mail.com',
            'password' => Hash::make('asdf1234'),
            'role' => 'admin'
        ]);
    }
}
