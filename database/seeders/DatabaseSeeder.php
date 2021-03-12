<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patient;
use App\Models\SocialWork;
use App\Models\TemplateClinicalHistory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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

        // Patient::factory(100)->create();

        TemplateClinicalHistory::factory(10)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'surgeon']);
        Role::create(['name' => 'cardiologist']);
        Role::create(['name' => 'secretary']);

        $user = User::create([
            'name' => 'MEDISYS',
            'email' => 'admin@mail.com',
            'password' => Hash::make('asdf1234'),
            'specialty' => 'surgeon',
            'enrollment' => 9999,
            'university' => 'UNNE',
            'observations' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam labore similique quidem facilis minus corrupti alias quis nihil illo rerum, possimus perferendis deserunt commodi omnis, ad fugiat porro expedita consequuntur.'
        ]);

        $user->assignRole('surgeon');
    }
}
