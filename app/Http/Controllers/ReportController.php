<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DateRangeResolver;
use App\Services\FinancialReportService;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function __construct(
        protected DateRangeResolver $dateRangeResolver,
        protected FinancialReportService $financialReportService
    ) {}

    public function index(Request $request)
    {
        $request->validate([
            'time_type' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        [$start, $end] = $this->dateRangeResolver->resolve(
            $request->time_type,
            $request->start_date,
            $request->end_date
        );

        return response()->json(
            $this->financialReportService->generate(
                Auth::id(),
                $start,
                $end
            )
        );
    }
}
