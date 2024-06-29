<?php

namespace Database\Seeders;

use App\Enums\UserRolesEnum;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'dikisan',
            'email' => 'diki@san.com',
            'password' => Hash::make('password'),
            'role' => UserRolesEnum::ADMIN->value
        ]);

        User::create([
            'name' => 'elza',
            'email' => 'membersan@gmail.com',
            'password' => Hash::make('password'),
            'role' => UserRolesEnum::MEMBER->value
        ]);
    }
}
