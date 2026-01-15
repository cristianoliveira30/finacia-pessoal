<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(function () {
    Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
});

?>
