<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository
{
    public function sumByTypeAndPeriod(int $userId, string $type, $start, $end): float
    {
        return Transaction::where('user_id', $userId)
            ->where('type', $type)
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');
    }

    public function sumByCategorySlug(int $userId, string $slug, $start, $end): float
    {
        return Transaction::query()
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('transactions.user_id', $userId)
            ->where('categories.slug', $slug)
            ->whereBetween('transaction_date', [$start, $end])
            ->sum('amount');
    }


    public function getByPeriod(int $userId, $start, $end)
    {
        return Transaction::where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end])
            ->get();
    }

    public function getExpensesGroupedByCategory($userId, $start, $end)
    {
        return Transaction::query()
            ->selectRaw('categories.name as category_name, SUM(amount) as total')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('transactions.user_id', $userId)
            ->where('transactions.type', 'expense')
            ->whereBetween('transaction_date', [$start, $end])
            ->groupBy('categories.name')
            ->orderByDesc('total')
            ->get();
    }

    public function getTopExpenseCategory(int $userId, $start, $end)
    {
        return Transaction::query()
            ->selectRaw('categories.name as category_name, SUM(amount) as total')
            ->join('categories', 'transactions.category_id', '=', 'categories.id')
            ->where('transactions.user_id', $userId)
            ->where('transactions.type', 'expense')
            ->whereBetween('transaction_date', [$start, $end])
            ->groupBy('categories.name')
            ->orderByDesc('total')
            ->first(); // <- só o maior
    }

    public function countTransactions(int $userId, $start, $end): int
    {
        return Transaction::where('user_id', $userId)
            ->whereBetween('transaction_date', [$start, $end])
            ->count();
    }
}
