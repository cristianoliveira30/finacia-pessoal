<?php

namespace App\Repositories;

use App\Models\Transaction;
use Illuminate\Support\Collection;

class TransactionRepository
{
    /*
    |--------------------------------------------------------------------------
    | SUMS
    |--------------------------------------------------------------------------
    */

    public function sumByTypeAndPeriod(
        int $userId,
        string $type,
        $start,
        $end
    ): float {
        return (float) Transaction::where('user_id', $userId)
            ->where('type', $type)
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');
    }

    public function sumByCategorySlug(
        int $userId,
        string $slug,
        $start,
        $end
    ): float {
        return (float) Transaction::query()
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('transactions.user_id', $userId)
            ->where('categories.slug', $slug) // food | transport
            ->whereBetween('transactions.transaction_date', [$start, $end])
            ->sum('transactions.amount');
    }

    /*
    |--------------------------------------------------------------------------
    | LISTS
    |--------------------------------------------------------------------------
    */

    public function getByPeriod(
        int $userId,
        $start,
        $end
    ): Collection {
        return Transaction::where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end])
            ->get();
    }

    public function getExpensesGroupedByCategory(
        int $userId,
        $start,
        $end
    ): Collection {
        return Transaction::query()
            ->selectRaw('categories.name as category_name, SUM(transactions.amount) as total')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('transactions.user_id', $userId)
            ->where('transactions.type', 'expense')
            ->whereBetween('transactions.transaction_date', [$start, $end])
            ->groupBy('categories.name')
            ->orderByDesc('total')
            ->get();
    }

    public function getTopExpenseCategory(
        int $userId,
        $start,
        $end
    ) {
        return Transaction::query()
            ->selectRaw('categories.name as category_name, SUM(transactions.amount) as total')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('transactions.user_id', $userId)
            ->where('transactions.type', 'expense')
            ->whereBetween('transactions.transaction_date', [$start, $end])
            ->groupBy('categories.name')
            ->orderByDesc('total')
            ->first();
    }

    /*
    |--------------------------------------------------------------------------
    | COUNTERS
    |--------------------------------------------------------------------------
    */

    public function countTransactions(
        int $userId,
        $start,
        $end
    ): int {
        return Transaction::where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end])
            ->count();
    }

    /*
    |--------------------------------------------------------------------------
    | CHART DATA
    |--------------------------------------------------------------------------
    */

    public function getMonthlyIncomeVsExpense(
        int $userId,
        $start,
        $end
    ) {
        return Transaction::query()
            ->selectRaw("
            DATE_FORMAT(transaction_date, '%Y-%m') as month_key,
            DATE_FORMAT(transaction_date, '%b') as month,
            SUM(CASE WHEN type = 'income' THEN amount ELSE 0 END) as income,
            SUM(CASE WHEN type = 'expense' THEN amount ELSE 0 END) as expense
        ")
            ->where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end])
            ->groupByRaw("DATE_FORMAT(transaction_date, '%Y-%m'), DATE_FORMAT(transaction_date, '%b')")
            ->orderBy('month_key')
            ->get();
    }
}
