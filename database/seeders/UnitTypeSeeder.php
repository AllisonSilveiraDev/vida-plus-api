<?php

namespace Database\Seeders;

use App\Models\UnitType;
use Illuminate\Database\Seeder;

class UnitTypeSeeder extends Seeder
{
    public function run()
    {
        $unitTypes = [
            [
                'descriptive_id' => 'hospital',
                'name' => 'hospital',
                'description' => 'Unidade hospitalar',
            ],
            [
                'descriptive_id' => 'clinica',
                'name' => 'Clínica',
                'description' => 'Unidade clínica',
            ],
            [
                'descriptive_id' => 'laboratorio',
                'name' => 'Laboratório',
                'description' => 'Unidade Laboratórial',
            ],
            [
                'descriptive_id' => 'homeCare',
                'name' => 'Home care',
                'description' => 'equipe de home care',
            ],
        ];

        foreach ($unitTypes as $type) {
            UnitType::firstOrCreate(
                ['descriptive_id' => $type['descriptive_id']],
                [
                    'name' => $type['name'],
                    'description' => $type['description'],
                ]
            );
        }
    }
}
