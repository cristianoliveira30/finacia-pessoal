<?php

namespace App\Repositories;

use App\Models\BudgetItem;
use Illuminate\Support\Collection;

class BudgetRepository
{
    public function getTotalsByArea(int $userId, string $month): Collection
    {
        return BudgetItem::query()
            ->selectRaw('area, SUM(planned) as planned, SUM(actual) as actual')
            ->whereHas('budget', function ($q) use ($userId, $month) {
                $q->where('user_id', $userId)
                  ->where('month', $month);
            })
            ->groupBy('area')
            ->get();
    }
}
