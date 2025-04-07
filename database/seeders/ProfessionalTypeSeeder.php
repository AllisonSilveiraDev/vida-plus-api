<?php

namespace Database\Seeders;

use App\Models\ProfessionalType;
use Illuminate\Database\Seeder;

class ProfessionalTypeSeeder extends Seeder
{
    public function run()
    {
        $professionalTypes = [
            [
                'descriptive_id' => 'medico',
                'name' => 'Médico',
                'description' => 'Profissional médico',
            ],
            [
                'descriptive_id' => 'enfermeiro',
                'name' => 'Enfermeiro',
                'description' => 'Profissional enfermeiro',
            ],
            [
                'descriptive_id' => 'tecnico',
                'name' => 'Técnico',
                'description' => 'Profissional técnico',
            ],
        ];

        foreach ($professionalTypes as $type) {
            ProfessionalType::firstOrCreate(
                ['descriptive_id' => $type['descriptive_id']],
                [
                    'name' => $type['name'],
                    'description' => $type['description'],
                ]
            );
        }
    }
}
