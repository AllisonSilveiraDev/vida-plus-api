<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleType;

class RoleTypeSeeder extends Seeder {
    public function run() {
        $roles = [
            ['id' => 1, 'descriptive_id' => 'admin', 'name' => 'Administrador', 'description' => 'Usuário com acesso total ao sistema.'],
            ['id' => 2, 'descriptive_id' => 'medico', 'name' => 'Médico', 'description' => 'Profissional de saúde que realiza atendimentos.'],
            ['id' => 3, 'descriptive_id' => 'paciente', 'name' => 'Paciente', 'description' => 'Pessoa que recebe atendimento médico.'],
        ];

        foreach ($roles as $role) {
            RoleType::updateOrCreate(['id' => $role['id']], $role);
        }
    }
}
