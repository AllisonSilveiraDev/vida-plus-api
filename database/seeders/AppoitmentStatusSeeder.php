<?php

namespace Database\Seeders;

use App\Models\AppointmentStatus;
use Illuminate\Database\Seeder;

class AppoitmentStatusSeeder extends Seeder
{
    public function run()
    {
        $appoimentTypes = [
            [
                'descriptive_id' => 'agendado',
                'name' => 'Agendado',
                'description' => 'Consulta agendada',
            ],
            [
                'descriptive_id' => 'cancelada',
                'name' => 'Cancelada',
                'description' => 'Consulta cancelada',
            ],
            [
                'descriptive_id' => 'concluida',
                'name' => 'Concluida',
                'description' => 'Consulta concluida',
            ],
        ];

        foreach ($appoimentTypes as $type) {
            AppointmentStatus::firstOrCreate(
                ['descriptive_id' => $type['descriptive_id']],
                [
                    'name' => $type['name'],
                    'description' => $type['description'],
                ]
            );
        }
    }
}
