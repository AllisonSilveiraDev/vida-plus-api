<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthcareProfessional;

class HealthcareProfessionalSeeder extends Seeder
{
    public function run(): void
    {
        $professionals = [
            [
                'id' => 1,
                'first_name' => 'Maria',
                'last_name' => 'Fernandes',
                'license_number' => 'CRM123456',
                'cpf' => '12345678901',
                'rg' => '123456789',
                'phone' => '51999999999',
                'email' => 'maria.fernandes@example.com',
                'address' => 'Rua B, Bairro D, Cidade Osório, Estado RS',
                'gender' => 'Feminino',
                'professional_type_id' => 1,
                'specialty' => 'Clínico Geral',
            ],
            [
                'id' => 2,
                'first_name' => 'Carlos',
                'last_name' => 'Souza',
                'license_number' => 'CRM654321',
                'cpf' => '98765432100',
                'rg' => '987654321',
                'phone' => '51988888888',
                'email' => 'carlos.souza@example.com',
                'address' => 'Rua C, Bairro E, Cidade Osório, Estado RS',
                'gender' => 'Masculino',
                'professional_type_id' => 2,
                'specialty' => 'Cardiologista',
            ],
        ];

        foreach ($professionals as $professional) {
            HealthcareProfessional::firstOrCreate(
                ['id' => $professional['id']],
                $professional
            );
        }
    }
}
