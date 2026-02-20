<?php

namespace App\Services;

use App\Repositories\BudgetRepository;

class BudgetMiniBoxService
{
    public function __construct(
        protected BudgetRepository $budgetRepository
    ) {}

    public function generate(int $userId, string $month): array
    {
        $areasFromDb = $this->budgetRepository
            ->getTotalsByArea($userId, $month)
            ->keyBy('area');

        $defaultAreas = [
            'Moradia',
            'Transporte',
            'Alimentação',
            'Saúde',
            'Educação',
            'Pessoal',
            'Outros',
        ];

        return collect($defaultAreas)->map(function ($area) use ($areasFromDb) {

            $data = $areasFromDb->get($area);

            $planned = (float) ($data->planned ?? 0);
            $actual  = (float) ($data->actual ?? 0);

            $icon = '';
            $color = 'text-blue-500';

            switch ($area) {
                case 'Moradia':
                    $icon = 'bi-house';
                    $color = 'text-purple-400';
                    break;
                case 'Transporte':
                    $icon = 'bi-car-front-fill';
                    $color = 'text-slate-400';
                    break;
                case 'Alimentação':
                    $icon = 'bi-cart4';
                    $color = 'text-orange-400';
                    break;
                case 'Saúde':
                    $icon = 'bi-heart';
                    $color = 'text-red-400';
                    break;
                case 'Educação':
                    $icon = 'bi-book';
                    $color = 'text-cyan-400';
                    break;
                case 'Pessoal':
                    $icon = 'bi-gift';
                    $color = 'text-indigo-400';
                    break;
                case 'Outros':
                    $icon = 'bi-question-circle';
                    $color = 'text-gray-400';
                    break;
            }

            $percentage = $planned > 0
                ? round(($actual / $planned) * 100)
                : 0;

            return [
                'label' => $labels[$area] ?? ucfirst($area),

                'value' => number_format($actual, 2, ',', '.'),

                'prefix' => 'R$ ',
                'suffix' => '',

                'planned' => $planned, // número bruto (view formata)
                'percentage' => $percentage,

                'status' => $percentage > 100 ? 'critical' : 'ok',

                'icon_name' => $icon,

                'color' => $color,

                'hint' => 'Execução do orçamento da área',

                'tooltip_html' => "
                <strong>{$area}</strong><br>
                Previsto: R$ " . number_format($planned, 2, ',', '.') . "<br>
                Realizado: R$ " . number_format($actual, 2, ',', '.') . "<br>
                Execução: {$percentage}%
            ",

                'link' => '#',
            ];
        })->toArray();
    }
}
