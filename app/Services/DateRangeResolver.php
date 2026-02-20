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

    public function resolve(
        ?string $type = 'mes-atual',
        ?string $start = null,
        ?string $end = null
    ): array {

        $type ??= 'mes-atual';

        return match ($type) {

            'mes-atual' => [
                now()->startOfMonth()->startOfDay(),
                now()->endOfMonth()->endOfDay()
            ],

            'mes-passado' => [
                now()->subMonth()->startOfMonth()->startOfDay(),
                now()->subMonth()->endOfMonth()->endOfDay()
            ],

            'periodo' => [
                $start
                    ? Carbon::createFromFormat('Y-m', $start)->startOfMonth()->startOfDay()
                    : now()->startOfMonth(),

                $start
                    ? Carbon::createFromFormat('Y-m', $start)->endOfMonth()->endOfDay()
                    : now()->endOfMonth(),
            ],

            default => [
                now()->startOfMonth(),
                now()->endOfMonth(),
            ],
        };
    }
}
