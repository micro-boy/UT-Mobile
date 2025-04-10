<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;

Route::get('/', [LoanController::class, 'index'])->name('loan.index');
Route::get('/loan/{id}', [LoanController::class, 'show'])->name('loan.show');
Route::get('/loan/create', [LoanController::class, 'create'])->name('loan.create');
