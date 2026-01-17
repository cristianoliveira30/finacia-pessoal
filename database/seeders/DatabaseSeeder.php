<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Antes de tudo, vamos criar os departamentos e permissões
        $departments = [
            ['name' => 'Administração'],
            ['name' => 'Financeiro'],
            ['name' => 'Educação'],
            ['name' => 'Saúde']
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }

        $roles = [
            ['name' => 'Admin', 'description' => 'Administrador do sistema', 'level' => 100],
            ['name' => 'Manager', 'description' => 'Gerente de departamento', 'level' => 90],
            ['name' => 'Staff', 'description' => 'Funcionário regular', 'level' => 50],
            ['name' => 'Intern', 'description' => 'Estagiário', 'level' => 10],
            ['name' => 'Guest', 'description' => 'Usuário convidado', 'level' => 1],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        // Vamos separar o departamento e a permissão padrão para os novos usuários
        $defaultDepartment = Department::where('name', 'Administração')->first();
        $defaultRole = Role::where('name', 'Admin')->first();

        // Create default users
        $users = [
            [
                'name' => 'Marcus Calderaro',
                'username' => 'marcus.calderaro',
                'email' => 'marcuseduardo54@gmail.com',
                'password' => Hash::make('321654987'),
                'department_id' => $defaultDepartment->id,
                'role_id' => $defaultRole->id
            ],
            [
                'name' => 'Celso Castro',
                'username' => 'celso.castro',
                'email' => 'celsoos@hotmail.com',
                'password' => Hash::make('12345678'),
                'department_id' => $defaultDepartment->id,
                'role_id' => $defaultRole->id
            ],
            [
                'name' => 'Cristian Roan',
                'username' => 'cristian.roan',
                'email' => 'cristianroan30@gmail.com',
                'password' => Hash::make('87654321'),
                'department_id' => $defaultDepartment->id,
                'role_id' => $defaultRole->id
            ],
            [
                'name' => 'Renan Cardoso',
                'username' => 'renan.cardoso',
                'email' => 'superrenanxxx@gmail.com',
                'password' => Hash::make('244466666'),
                'department_id' => $defaultDepartment->id,
                'role_id' => $defaultRole->id
            ],
            [
                'name' => 'Natanael Maia',
                'username' => 'nata.maia',
                'email' => 'natamaia101@gmail.com',
                'password' => Hash::make('12345678'),
                'department_id' => $defaultDepartment->id,
                'role_id' => $defaultRole->id
            ],
            [
                'name' => 'Mateus Farias',
                'username' => 'mateus.farias',
                'email' => 'mateus.sarges99@gmail.com',
                'password' => Hash::make('12345678'),
                'department_id' => $defaultDepartment->id,
                'role_id' => $defaultRole->id
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
