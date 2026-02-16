<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'type',
        'amount',
        'transaction_date',
        'description',
        'is_fixed',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'is_fixed' => 'boolean',
        'amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeIncome($query)
    {
        return $query->where('type', 'income');
    }

    public function scopeExpense($query)
    {
        return $query->where('type', 'expense');
    }

    public function scopeForMonth($query, int $year, int $month)
    {
        return $query->whereYear('transaction_date', $year)
            ->whereMonth('transaction_date', $month);
    }

    public function scopeBetweenDates($query, $start, $end)
    {
        return $query->whereBetween('transaction_date', [$start, $end]);
    }
}
