<?php

namespace App\Services;

use App\Repositories\TransactionRepository;

class FinancialReportService
{
    public function __construct(
        protected TransactionRepository $transactionRepository
    ) {}

    public function generate(int $userId, $start, $end): array
    {
        $income = $this->transactionRepository
            ->sumByTypeAndPeriod($userId, 'income', $start, $end);

        $expense = $this->transactionRepository
            ->sumByTypeAndPeriod($userId, 'expense', $start, $end);

        $expensesByCategory = $this->transactionRepository
            ->getExpensesGroupedByCategory($userId, $start, $end);

        $balance = $income - $expense;

        $expensePercentage = $income > 0
            ? round(($expense / $income) * 100, 2)
            : 0;

        return [
            'summary' => $this->buildSummary(
                $income,
                $expense,
                $balance,
                $expensePercentage,
            ),

            'charts' => $this->buildCharts(
                $income,
                $expense,
                $expensesByCategory
            )
        ];
    }


    // =========================
    // KPI SUMMARY
    // =========================

    private function buildSummary(
        float $income,
        float $expense,
        float $balance,
        float $expensePercentage,
    ): array {
        return [
            'balance' => [
                'value' => $balance,
                'status' => $this->resolveBalanceStatus($balance),
            ],

            'income' => [
                'value' => $income,
                'status' => 'ok',
            ],

            'expense' => [
                'value' => $expense,
                'status' => $this->resolveExpenseStatus($expensePercentage),
            ],

            'expense_percentage' => [
                'value' => round($expensePercentage, 1),
                'status' => $this->resolveExpenseStatus($expensePercentage),
            ],
        ];
    }

    // =========================
    // CHARTS
    // =========================

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

    // =========================
    // STATUS RESOLVERS
    // =========================

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
