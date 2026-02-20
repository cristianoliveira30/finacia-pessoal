<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class FinancialReportService
{
    public function __construct(
        protected TransactionRepository $transactionRepository
    ) {}

    public function generate(int $userId, string $start, string $end): array
    {
        /*
        |--------------------------------------------------------------------------
        | BASE VALUES
        |--------------------------------------------------------------------------
        */

        $income = $this->transactionRepository
            ->sumByTypeAndPeriod($userId, 'income', $start, $end);

        $expense = $this->transactionRepository
            ->sumByTypeAndPeriod($userId, 'expense', $start, $end);

        $food = $this->transactionRepository
            ->sumByCategorySlug($userId, 'food', $start, $end);

        $transport = $this->transactionRepository
            ->sumByCategorySlug($userId, 'transport', $start, $end);

        $expensesByCategory = $this->transactionRepository
            ->getExpensesGroupedByCategory($userId, $start, $end);

        /*
        |--------------------------------------------------------------------------
        | CALCULATIONS
        |--------------------------------------------------------------------------
        */

        $balance = $income - $expense;

        $expensePercentage = $income > 0
            ? round(($expense / $income) * 100, 2)
            : 0;

        /*
        |--------------------------------------------------------------------------
        | RESPONSE
        |--------------------------------------------------------------------------
        */

        return [
            'summary' => $this->buildSummary(
                $income,
                $expense,
                $balance,
                $expensePercentage,
                $food,
                $transport
            ),

            'charts' => $this->buildCharts(
                $income,
                $expense,
                $expensesByCategory
            ),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | SUMMARY
    |--------------------------------------------------------------------------
    */

    private function buildSummary(
        float $income,
        float $expense,
        float $balance,
        float $expensePercentage,
        float $food,
        float $transport
    ): array {

        return [

            'balance' => [
                'value' => number_format($balance, 2, ',', '.'),
                'raw' => $balance,
                'status' => $this->resolveBalanceStatus($balance),
                'prefix' => 'R$ ',
            ],

            'income' => [
                'value' => number_format($income, 2, ',', '.'),
                'raw' => $income,
                'status' => 'ok',
                'prefix' => 'R$ ',
            ],

            'expense' => [
                'value' => number_format($expense, 2, ',', '.'),
                'raw' => $expense,
                'status' => $this->resolveExpenseStatus($expensePercentage),
                'prefix' => 'R$ ',
            ],

            'expense_percentage' => [
                'value' => number_format($expensePercentage, 2, ',', '.'),
                'raw' => $expensePercentage,
                'suffix' => '%',
                'status' => $this->resolveExpenseStatus($expensePercentage),
            ],

            'food' => [
                'value' => number_format($food, 2, ',', '.'),
                'raw' => $food,
                'prefix' => 'R$ ',
            ],

            'transport' => [
                'value' => number_format($transport, 2, ',', '.'),
                'raw' => $transport,
                'prefix' => 'R$ ',
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | CHARTS
    |--------------------------------------------------------------------------
    */

    private function buildCharts(
        float $income,
        float $expense,
        $expensesByCategory
    ): array {

        return [

            'income_vs_expense' => [
                'labels' => ['Receitas', 'Despesas'],
                'series' => [$income, $expense],
            ],

            'expenses_by_category' => [
                'labels' => $expensesByCategory->pluck('category_name')->toArray(),
                'series' => $expensesByCategory->pluck('total')->toArray(),
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS RESOLVERS
    |--------------------------------------------------------------------------
    */

    private function resolveBalanceStatus(float $balance): string
    {
        if ($balance > 0) return 'ok';
        if ($balance < 0) return 'critical';
        return 'unstable';
    }

    private function resolveExpenseStatus(float $percentage): string
    {
        if ($percentage > 90) return 'critical';
        if ($percentage > 60) return 'unstable';
        return 'ok';
    }
}
