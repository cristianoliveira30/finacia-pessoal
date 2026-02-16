<?php

namespace Database\Seeders;

use App\Models\MonthlySetting;
use App\Models\User;
use Illuminate\Database\Seeder;

class MonthlySettingsSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        MonthlySetting::create([
            'user_id' => $user->id,
            'year' => now()->year,
            'month' => now()->month,
            'salary' => 3500.00,
            'saving_goal' => 800.00,
            'expense_limit' => 2700.00,
        ]);
    }
}
