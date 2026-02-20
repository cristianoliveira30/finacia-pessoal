<?php

namespace App\Http\Controllers;

use App\Services\BudgetMiniBoxService;
use App\Services\DateRangeResolver;
use App\Services\FinancialReportService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected FinancialReportService $financialReportService;
    protected BudgetMiniBoxService $budgetMiniBoxService;
    protected DateRangeResolver $dateResolver;

    public function __construct(
        FinancialReportService $financialReportService,
        BudgetMiniBoxService $budgetMiniBoxService,
        DateRangeResolver $dateResolver
    ) {
        $this->financialReportService = $financialReportService;
        $this->budgetMiniBoxService = $budgetMiniBoxService;
        $this->dateResolver = $dateResolver;
    }

    public function index(Request $request)
    {
        $userId = Auth::id();

        [$start, $end] = $this->dateResolver->resolve(
            $request->input('tempo'),
            $request->input('inicio'),
            $request->input('fim')
        );

        $report = $this->financialReportService
            ->generate($userId, $start, $end);

        $budgetMini = $this->budgetMiniBoxService
            ->generate($userId, $start);

        return view('home', [
            'summary'   => $report['summary'],
            'charts'    => $report['charts'],
            'miniboxes' => $budgetMini,
        ]);
    }
}
