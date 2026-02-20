<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'user_id',
        'month',
        'income_planned',
        'income_actual',
    ];

    public function items()
    {
        return $this->hasMany(BudgetItem::class);
    }
}
