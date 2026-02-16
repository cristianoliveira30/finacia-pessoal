<?php

namespace App\Services;

use Carbon\Carbon;

class DateRangeResolver
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function resolve(string $type, ?string $start = null, ?string $end = null): array
    {
        return match ($type) {

            'today' => [
                Carbon::today()->startOfDay(),
                Carbon::today()->endOfDay()
            ],

            'yesterday' => [
                Carbon::yesterday()->startOfDay(),
                Carbon::yesterday()->endOfDay()
            ],

            'current_week' => [
                Carbon::now()->startOfWeek()->startOfDay(),
                Carbon::now()->endOfWeek()->endOfDay()
            ],

            'last_week' => [
                Carbon::now()->subWeek()->startOfWeek()->startOfDay(),
                Carbon::now()->subWeek()->endOfWeek()->endOfDay()
            ],

            'current_month' => [
                Carbon::now()->startOfMonth()->startOfDay(),
                Carbon::now()->endOfMonth()->endOfDay()
            ],

            'last_month' => [
                Carbon::now()->subMonth()->startOfMonth()->startOfDay(),
                Carbon::now()->subMonth()->endOfMonth()->endOfDay()
            ],

            'period' => [
                Carbon::parse($start)->startOfDay(),
                Carbon::parse($end)->endOfDay()
            ],

            default => throw new \InvalidArgumentException('Invalid time type'),
        };
    }
}
