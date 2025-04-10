<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleTypeSeeder::class,
            ProfessionalTypeSeeder::class,
            PatientSeeder::class,
            AppoitmentTypeSeeder::class,
            ExamStatusSeeder::class,
            UnitTypeSeeder::class,
            HealthcareProfessionalSeeder::class,
            UserSeeder::class,
        ]);
    }
}
