<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        $users = [
            [
                'name' => 'Marcus Calderaro',
                'username' => 'marcus.calderaro',
                'email' => 'marcuseduardo54@gmail.com',
                'password' => Hash::make('321654987')
            ],
            [
                'name' => 'Celso Castro',
                'username' => 'celso.castro',
                'email' => 'celsoos@hotmail.com',
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Cristian Roan',
                'username' => 'cristian.roan',
                'email' => 'cristianroan30@gmail.com',
                'password' => Hash::make('87654321')
            ],
            [
                'name' => 'Renan Cardoso',
                'username' => 'renan.cardoso',
                'email' => 'superrenanxxx@gmail.com',
                'password' => Hash::make('244466666')
            ],
            [
                'name' => 'Natanael Maia',
                'username' => 'nata.maia',
                'email' => 'natamaia101@gmail.com',
                'password' => Hash::make('12345678')
            ]
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
