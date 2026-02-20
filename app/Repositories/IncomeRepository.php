<?php

namespace App\Repositories;

use App\Models\MonthlyIncome;
use App\Models\IncomeItem;

class IncomeRepository
{
    public function createMonthly(array $data): MonthlyIncome
    {
        return MonthlyIncome::create($data);
    }

    public function createItem(array $data): IncomeItem
    {
        return IncomeItem::create($data);
    }
}