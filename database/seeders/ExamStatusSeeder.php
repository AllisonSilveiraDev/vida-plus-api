<?php

namespace Database\Seeders;

use App\Models\ExamStatus;
use Illuminate\Database\Seeder;

class ExamStatusSeeder extends Seeder
{
    public function run()
    {
        $examStatus = [
            [
                'descriptive_id' => 'agendado',
                'name' => 'Agendado',
                'description' => 'Exame agendado',
            ],
            [
                'descriptive_id' => 'cancelado',
                'name' => 'Cancelado',
                'description' => 'Exame cancelado',
            ],
            [
                'descriptive_id' => 'concluido',
                'name' => 'Concluído',
                'description' => 'Exame concluído',
            ],
        ];

        foreach ($examStatus as $status) {
            ExamStatus::firstOrCreate(
                ['descriptive_id' => $status['descriptive_id']],
                [
                    'name' => $status['name'],
                    'description' => $status['description'],
                ]
            );
        }
    }
}
