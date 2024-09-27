<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __invoke()
  {
    // Total Pemasukan dan Pengeluaran Per Bulan
    $incomes = Transaction::where('type_id', 2)
      ->selectRaw('MONTH(transaction_date) as month, SUM(amount) as total')
      ->groupBy('month')
      ->pluck('total', 'month')->toArray();

    $expenses = Transaction::where('type_id', 1)
      ->selectRaw('MONTH(transaction_date) as month, SUM(amount) as total')
      ->groupBy('month')
      ->pluck('total', 'month')->toArray();


    $incomeData = [];
    $expenseData = [];
    for ($i = 1; $i <= 12; $i++) {
      $incomeData[$i] = $incomes[$i] ?? 0;
      $expenseData[$i] = $expenses[$i] ?? 0;
    }


    return view('dashboard.index', compact('incomeData', 'expenseData'));
  }
}
