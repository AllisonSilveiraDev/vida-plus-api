<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'first_name' => 'João',
            'last_name' => 'Silva',
            'email' => 'joao.silva@example.com',
            'password' => Hash::make('password123'),
            'role_id' => 3,
            'professional_id' => null,
            'patient_id' => null,
        ]);

        $patient = Patient::firstOrCreate([
            'birth_date' => '1996-01-01',
            'cpf' => '81146643551',
            'rg' => '346925745',
            'phone' => '51997422686',
            'address' => 'rua A, bairro C, cidade osorio, estado RS',
            'gender' => 'Masculino',
            'marital_status' => 'Solteiro',
            'blood_type' => 'O+',
            'user_id' => $user->id,
        ]);

        $user->update([
            'patient_id' => $patient->id,
        ]);
    }
}