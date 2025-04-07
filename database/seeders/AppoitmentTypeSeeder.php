<?php

namespace Database\Seeders;

use App\Models\AppointmentType;
use Illuminate\Database\Seeder;

class AppoitmentTypeSeeder extends Seeder
{
    public function run()
    {
        $appoimentTypes = [
            [
                'descriptive_id' => 'presencial',
                'name' => 'Presencial',
                'description' => 'Consulta presencial',
            ],
            [
                'descriptive_id' => 'telemedicina',
                'name' => 'Telemedicina',
                'description' => 'Consulta por telemedicina',
            ],
        ];

        foreach ($appoimentTypes as $type) {
            AppointmentType::firstOrCreate(
                ['descriptive_id' => $type['descriptive_id']],
                [
                    'name' => $type['name'],
                    'description' => $type['description'],
                ]
            );
        }
    }
}
