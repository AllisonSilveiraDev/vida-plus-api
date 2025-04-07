<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'first_name' => 'João',
                'last_name' => 'Silva',
                'email' => 'joao.silva@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 1,
                'professional_id' => null,
                'patient_id' => 1,
            ],
            [
                'first_name' => 'Maria',
                'last_name' => 'Fernandes',
                'email' => 'maria.fernandes@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2,
                'professional_id' => 1,
                'patient_id' => null,
            ],
            [
                'first_name' => 'Carlos',
                'last_name' => 'Souza',
                'email' => 'carlos.souza@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 3,
                'professional_id' => 2,
                'patient_id' => null,
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
