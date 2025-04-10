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
        $user = [
            'first_name' => 'Carlos',
            'last_name' => 'Fernandes',
            'email' => 'carols.fernandes@example.com',
            'password' => Hash::make('password123'),
            'role_id' => 1,
            'professional_id' => null,
            'patient_id' => null,
        ];
        
        User::firstOrCreate(
            ['email' => $user['email']],
            $user
        );
    }
}
