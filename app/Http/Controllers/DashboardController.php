<?php

namespace App\Http\Controllers;

use App\Services\DashboardMiniBoxService;
use App\Services\DateRangeResolver;
use App\Services\FinancialReportService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected FinancialReportService $service;
    protected DashboardMiniBoxService $miniBoxService;
    protected DateRangeResolver $dateResolver;

    public function __construct(
        FinancialReportService $service,
        DashboardMiniBoxService $miniBoxService,
        DateRangeResolver $dateResolver
    ) {
        $this->service = $service;
        $this->miniBoxService = $miniBoxService;
        $this->dateResolver = $dateResolver;
    }

    public function index(Request $request)
    {
        [$start, $end] = $this->dateResolver->resolve('current_month');

        $report = $this->service->generate(
            $request->user()->id,
            $start,
            $end
        );

        $report = $this->service->generate($request->user()->id, $start, $end);
        $miniBoxes = $this->miniBoxService->generate($request->user()->id, $start, $end);

        return view('home', [
            'summary' => $report['summary'],      // MAIN BOXES
            'charts' => $report['charts'],
            'miniboxes' => $miniBoxes['summary'], // MINI BOXES
        ]);
    }
}
