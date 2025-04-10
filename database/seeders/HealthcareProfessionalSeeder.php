<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthcareProfessional;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HealthcareProfessionalSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'first_name' => 'Maria',
            'last_name' => 'Fernandes',
            'email' => 'maria.fernandes@example.com',
            'password' => Hash::make('password123'),
            'role_id' => 2,
            'professional_id' => null,
            'patient_id' => null,
        ]);

        $professional = HealthcareProfessional::firstOrCreate([
            'license_number' => 'CRM123456',
            'cpf' => '12345678901',
            'rg' => '123456789',
            'phone' => '51999999999',
            'address' => 'Rua B, Bairro D, Cidade Osório, Estado RS',
            'gender' => 'Feminino',
            'professional_type_id' => 1,
            'specialty' => 'Clínico Geral',
            'user_id' => $user->id,
        ]);

        $user->update([
            'professional_id' => $professional->id,
        ]);
    }
}