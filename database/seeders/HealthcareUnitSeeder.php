<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HealthcareUnitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('healthcare_units')->insert([
            [
                'name' => 'Unidade Básica de Saúde Central',
                'cnpj' => '12.345.678/0001-90',
                'type_id' => 1,
                'address' => 'Rua das Flores, 123, Centro, Cidade Exemplo - EX',
                'phone' => '(11) 1234-5678',
            ],
            [
                'name' => 'Clinica Vida',
                'cnpj' => '98.765.432/0001-10',
                'type_id' => 2,
                'address' => 'Av. Principal, 456, Bairro Saúde, Cidade Exemplo - EX',
                'phone' => '(11) 9876-5432',
            ],
        ]);
    }
}
