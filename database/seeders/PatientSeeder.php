<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientSeeder extends Seeder {
    public function run() {
        Patient::firstOrCreate([
            'id' => 1,
            'first_name' => 'João',
            'last_name' => 'Silva',
            'birth_date' => '1996-01-01',
            'cpf' => '81146643551',
            'rg' => '346925745',
            'phone' => '51997422686',
            'email' => 'joao.silva@example.com',
            'address' => 'rua A, bairro C, cidade osorio, estado RS',
            'gender' => 'Masculino',
            'marital_status' => 'Solteiro',
            'blood_type' => 'O+',
        ]);
    }
}