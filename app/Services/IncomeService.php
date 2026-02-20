<?php

namespace App\Services;

use App\Repositories\IncomeRepository;
use Illuminate\Support\Facades\DB;

class IncomeService
{
    public function __construct(
        protected IncomeRepository $repository
    ) {}

    public function store(array $data)
    {
        return DB::transaction(function () use ($data) {

            $monthly = $this->repository->createMonthly([
                'month' => $data['month'],
                'income_planned' => $this->moneyToFloat($data['income_planned'] ?? 0),
                'income_actual' => $this->moneyToFloat($data['income_actual'] ?? 0),
            ]);

            foreach ($data['income'] ?? [] as $area => $items) {

                foreach ($items as $name => $values) {

                    $this->repository->createItem([
                        'monthly_income_id' => $monthly->id,
                        'area' => $area,
                        'name' => $name,
                        'planned' => $this->moneyToFloat($values['planned'] ?? 0),
                        'actual' => $this->moneyToFloat($values['actual'] ?? 0),
                    ]);
                }
            }

            return $monthly;
        });
    }

    private function moneyToFloat($value): float
    {
        if (!$value) return 0;

        return (float) str_replace(
            ',',
            '.',
            str_replace('.', '', $value)
        );
    }
}
