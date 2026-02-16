<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class DashboardMiniBoxService
{
    public function __construct(
        protected TransactionRepository $transactionRepository
    ) {}

    public function generate(int $userId, $start, $end): array
    {
        $monthlyExpense = $this->transactionRepository
            ->sumByTypeAndPeriod($userId, 'expense', $start, $end);

        $monthlyIncome = $this->transactionRepository
            ->sumByTypeAndPeriod($userId, 'income', $start, $end);

        $biggestCategory = $this->transactionRepository
            ->getTopExpenseCategory($userId, $start, $end);

        $transactionCount = $this->transactionRepository
            ->countTransactions($userId, $start, $end);

        $foodExpense = $this->transactionRepository
            ->sumByCategorySlug($userId, 'food', $start, $end);

        $transportExpense = $this->transactionRepository
            ->sumByCategorySlug($userId, 'transport', $start, $end);

        return [
            'summary' => [

                'fin_exec' => [
                    'value' => number_format($monthlyExpense, 2, ',', '.'),
                    'status' => $this->resolveExpenseStatus($monthlyExpense, $monthlyIncome),
                    'color' => 'text-red-500',
                    'link' => route('#'),
                ],

                'fin_arr' => [
                    'value' => number_format($monthlyIncome, 2, ',', '.'),
                    'status' => 'ok',
                    'color' => 'text-green-500',
                    'link' => route('#'),
                ],

                'biggest_category' => [
                    'value' => number_format($biggestCategory->total ?? 0, 2, ',', '.'),
                    'label_extra' => $biggestCategory->category_name ?? '—',
                    'status' => 'ok',
                    'color' => 'text-purple-500',
                    'link' => route('#'),
                ],

                'transactions_count' => [
                    'value' => $transactionCount,
                    'status' => 'ok',
                    'color' => 'text-blue-500',
                    'link' => route('#'),
                ],

                'food_expense' => [
                    'value' => number_format($foodExpense, 2, ',', '.'),
                    'status' => 'ok',
                    'color' => 'text-orange-500',
                    'link' => route('#'),
                ],

                'transport_expense' => [
                    'value' => number_format($transportExpense, 2, ',', '.'),
                    'status' => 'ok',
                    'color' => 'text-yellow-500',
                    'link' => route('#'),
                ],
            ],

            'charts' => [] // pode preencher depois
        ];
    }


    private function resolveExpenseStatus(float $expense, float $income): string
    {
        if ($income == 0) return 'ok';

        $percentage = ($expense / $income) * 100;

        if ($percentage > 90) return 'critical';
        if ($percentage > 60) return 'unstable';

        return 'ok';
    }
}
