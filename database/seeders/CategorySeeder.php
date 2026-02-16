<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        $categories = [
            ['name' => 'Salário', 'slug' => 'salary', 'type' => 'income'],
            ['name' => 'Freelance', 'slug' => 'freelance', 'type' => 'income'],
            ['name' => 'Aluguel', 'slug' => 'rent', 'type' => 'expense'],
            ['name' => 'Mercado', 'slug' => 'food', 'type' => 'expense'],
            ['name' => 'Lazer', 'slug' => 'leisure', 'type' => 'expense'],
            ['name' => 'Transporte', 'slug' => 'transport', 'type' => 'expense'],
        ];


        foreach ($categories as $category) {
            Category::updateOrCreate([
                'user_id' => $user->id,
                'name' => $category['name'],
                'slug' => $category['slug'],
                'type' => $category['type'],
            ]);
        }
    }
}
