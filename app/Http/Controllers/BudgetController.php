<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\BudgetItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BudgetController extends Controller
{
    public function create()
    {
        return view('navigation.budgets.create');
    }

    public function store(Request $request)
    {
        try {

            $request->merge([
                'income_planned' => $this->normalizeMoney($request->income_planned),
                'income_actual'  => $this->normalizeMoney($request->income_actual),
                'month' => $request->month . '-01',
            ]);

            if ($request->budget) {
                foreach ($request->budget as $area => $items) {
                    foreach ($items as $item => $values) {
                        $request->merge([
                            "budget.$area.$item.planned" =>
                            $this->normalizeMoney($values['planned'] ?? 0),

                            "budget.$area.$item.actual" =>
                            $this->normalizeMoney($values['actual'] ?? 0),
                        ]);
                    }
                }
            }

            $validated = $request->validate([
                'month' => 'required|date',
                'income_planned' => 'required|numeric|min:0',
                'income_actual' => 'nullable|numeric|min:0',
                'budget' => 'required|array',
            ]);

            $month = $request->month . '-01';

            DB::beginTransaction();

            $budget = Budget::create([
                'user_id' => Auth::id(),
                'month' => $month,
                'income_planned' => $validated['income_planned'],
                'income_actual' => $validated['income_actual'] ?? 0,
            ]);


            foreach ($validated['budget'] as $area => $items) {

                foreach ($items as $itemName => $values) {

                    BudgetItem::create([
                        'budget_id' => $budget->id,
                        'area' => $area,
                        'name' => $itemName,
                        'planned' => $values['planned'] ?? 0,
                        'actual' => $values['actual'] ?? 0,
                    ]);
                }
            }

            DB::commit();

            return redirect()
            ->route('budgets.create')
            ->with('success', 'Orçamento salvo com sucesso!');
        } catch (\Throwable $e) {

            DB::rollBack();

            return redirect()
                ->route('budgets.create')
                ->with('error', 'Erro ao salvar orçamento: ' . $e->getMessage());
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
