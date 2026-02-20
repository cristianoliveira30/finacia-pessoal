<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyIncome extends Model
{
    protected $fillable = [
        'month',
        'income_planned',
        'income_actual'
    ];

    public function items()
    {
        return $this->hasMany(IncomeItem::class);
    }
}
