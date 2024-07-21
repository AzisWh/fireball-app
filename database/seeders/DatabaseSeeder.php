<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'azis',
            'email' => 'aziswh7@gmail.com',
            'password' => Hash::make('aziswh7@gmail.com'),
            'phone_number' => '987654321',
            'role_type' => 0,
        ]);

        User::factory()->create([
            'name' => 'InragaAdmin',
            'email' => 'inragaadmin@gmail.com',
            'password' => Hash::make('inragaadmin@gmail.com'),
            'phone_number' => '987654321',
            'role_type' => 1,
        ]);

        User::factory()->create([
            'name' => 'superadmin',
            'email' => 'inragasuper@gmail.com',
            'password' => Hash::make('inragasuper@gmail.com'),
            'phone_number' => '1122334455',
            'role_type' => 2,
        ]);
    }
}
