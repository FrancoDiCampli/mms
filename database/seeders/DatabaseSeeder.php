<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Sys Medical',
            'email' => 'admin@mail.com',
            'password' => Hash::make('asdf1234'),
            'specialty' => 'admin'
        ]);

        SocialWork::create([
            'name' => 'INSSSEP'
        ]);
    }
}
