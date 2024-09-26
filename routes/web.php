<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('layouts.dashboard');
});


Route::get('/dashboard', DashboardController::class)->name('dashboard.index');


Route::prefix('transaction')->group(function () {
  Route::get('/', [TransactionController::class, 'income'])->name('transactions.index');
  Route::get('/income', [TransactionController::class, 'income'])->name('transactions.income');
  Route::get('/expense', [TransactionController::class, 'expense'])->name('transactions.expense');

  Route::get('/new', [TransactionController::class, 'create'])->name('transactions.create');
  Route::post('/store', [TransactionController::class, 'store'])->name('transactions.store');
  Route::get('/edit/{id}', [TransactionController::class, 'edit'])->name('transactions.edit');
  Route::put('/update/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');

  Route::delete('/delete/{transaction}', [
    TransactionController::class,
    'destroy'
  ])->name('transactions.destroy');
});
