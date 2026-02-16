<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonthlySetting extends Model
{
    protected $fillable = [
        'user_id',
        'year',
        'month',
        'salary',
        'saving_goal',
        'expense_limit',
        'notes',
    ];

    protected $casts = [
        'salary' => 'decimal:2',
        'saving_goal' => 'decimal:2',
        'expense_limit' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
