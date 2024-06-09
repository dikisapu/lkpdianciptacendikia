<?php

namespace Database\Seeders;

use App\Enums\UserRolesEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InstrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Instruktur 1',
                'email' => 'instruktur@gmail.com',
                'password' => Hash::make('masuk123'),
                'role' => UserRolesEnum::INSTRUKTUR->value
            ],
            [
                'name' => 'Instruktur 2',
                'email' => 'instruktur2@gmail.com',
                'password' => Hash::make('masuk123'),
                'role' => UserRolesEnum::INSTRUKTUR->value
            ],
        ];

        User::insert($data);
    }
}
