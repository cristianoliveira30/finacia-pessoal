<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\NoStoreHtml;
use Illuminate\Support\Facades\Route;

Route::middleware([NoStoreHtml::class, 'guest'])->group(function () {
    Route::view('/login', 'welcome')->name('login');
    Route::redirect('/', '/login');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    require __DIR__ . '/modules/user.php';
    require __DIR__ . '/modules/fallback.php';
    require __DIR__ . '/modules/core.php';

    Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
    Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');
    Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
    Route::post('/incomes', [IncomeController::class, 'store'])->name('incomes.store');
});

// HELPERS
Route::get('/csrf/refresh', function () {
    request()->session()->regenerateToken();
    return response()->json(['token' => csrf_token()]);
})->name('csrf.refresh');