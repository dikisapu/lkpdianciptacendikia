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
                'name' => 'Edialpiono',
                'email' => 'instruktur@gmail.com',
                'password' => Hash::make('masuk123'),
                'role' => UserRolesEnum::INSTRUKTUR->value
            ],
            [
                'name' => 'Dewieryanti',
                'email' => 'instruktur2@gmail.com',
                'password' => Hash::make('masuk123'),
                'role' => UserRolesEnum::INSTRUKTUR->value
            ],
        ];

        User::insert($data);
    }
}
