<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReminderController;

Route::middleware('auth')->group(function () {
    Route::resource('transactions', TransactionController::class);
    Route::resource('reminders', ReminderController::class)->only(['index','create','store','destroy']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
