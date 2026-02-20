<?php

namespace App\Http\Controllers;

use App\Models\MonthlyIncome;
use App\Models\IncomeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function create()
    {
        return view('navigation.incomes.create');
    }

    public function store(Request $request)
    {
        try {

            /*
            |--------------------------------------------------------------------------
            | Normalização dos valores monetários
            |--------------------------------------------------------------------------
            */

            $request->merge([
                'income_planned' => $this->normalizeMoney($request->income_planned),
                'income_actual'  => $this->normalizeMoney($request->income_actual),
                'month' => $request->month . '-01',
            ]);

            if ($request->income) {
                foreach ($request->income as $area => $items) {
                    foreach ($items as $item => $values) {
                        $request->merge([
                            "income.$area.$item.planned" =>
                                $this->normalizeMoney($values['planned'] ?? 0),

                            "income.$area.$item.actual" =>
                                $this->normalizeMoney($values['actual'] ?? 0),
                        ]);
                    }
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Validação
            |--------------------------------------------------------------------------
            */

            $validated = $request->validate([
                'month' => 'required|date',
                'income_planned' => 'required|numeric|min:0',
                'income_actual' => 'nullable|numeric|min:0',
                'income' => 'required|array',
            ]);

            DB::beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | Criação do registro mensal
            |--------------------------------------------------------------------------
            */

            $monthlyIncome = MonthlyIncome::create([
                'user_id' => Auth::id(),
                'month' => $validated['month'],
                'income_planned' => $validated['income_planned'],
                'income_actual' => $validated['income_actual'] ?? 0,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Criação dos itens
            |--------------------------------------------------------------------------
            */

            foreach ($validated['income'] as $area => $items) {

                foreach ($items as $itemName => $values) {

                    IncomeItem::create([
                        'monthly_income_id' => $monthlyIncome->id,
                        'area' => $area,
                        'name' => $itemName,
                        'planned' => $values['planned'] ?? 0,
                        'actual' => $values['actual'] ?? 0,
                    ]);
                }
            }

            DB::commit();

            return redirect()
                ->route('incomes.create')
                ->with('success', 'Receitas salvas com sucesso!');

        } catch (\Throwable $e) {

            DB::rollBack();

            return redirect()
                ->route('incomes.create')
                ->with('error', 'Erro ao salvar receitas: ' . $e->getMessage());
        }
    }

    private function normalizeMoney($value)
    {
        if (!$value) {
            return 0;
        }

        return (float) str_replace(
            ',',
            '.',
            str_replace('.', '', $value)
        );
    }
}