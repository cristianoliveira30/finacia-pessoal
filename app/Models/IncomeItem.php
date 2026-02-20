<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IncomeItem extends Model
{
    protected $fillable = [
        'monthly_income_id',
        'area',
        'name',
        'planned',
        'actual'
    ];

    public function monthlyIncome()
    {
        return $this->belongsTo(MonthlyIncome::class);
    }
}