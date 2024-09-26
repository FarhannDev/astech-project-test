<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  public function index()
  {
    $transactions = Transaction::with(['type', 'category']);
    $types = TransactionType::all();
    $categories = TransactionCategory::all();

    return view('transactions.index', compact('transactions', 'types', 'categories'));
  }

  public function income()
  {
    $transactions = Transaction::where('type_id', 1)
      ->latest()
      ->paginate(5);

    return view('transactions.index', compact('transactions'));
  }
  public function expense()
  {
    $transactions = Transaction::where('type_id', 2)
      ->latest()
      ->paginate(10);


    return view('transactions.expense', compact('transactions'));
  }


  public function create()
  {
    $transactions = Transaction::with(['type', 'category']);
    $types = TransactionType::all();
    $categories = TransactionCategory::all();
    return view('transactions.add', compact('transactions', 'types', 'categories'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'type_id'          => 'required|exists:transaction_types,id',
      'category_id'      => 'required|exists:transaction_categories,id',
      'amount'           => 'required|numeric|min:0',
      'transaction_date' => 'required|date',
    ]);

    Transaction::create($request->all());

    return redirect()
      ->route("transactions.index")
      ->with('success', 'Transaksi berhasil ditambahkan.');
  }

  public function edit($id)
  {
    $transaction = Transaction::findOrFail($id);
    $types = TransactionType::all();
    $categories = TransactionCategory::all();

    return view('transactions.edit', compact('transaction', 'types', 'categories'));
  }


  public function update(Request $request, Transaction $transaction)
  {
    $request->validate([
      'type_id'          => 'required|exists:transaction_types,id',
      'category_id'      => 'required|exists:transaction_categories,id',
      'amount'           => 'required|numeric|min:0',
      'transaction_date' => 'required|date',
    ]);

    $transaction->update($request->all());

    return redirect()
      ->route("transactions.index")
      ->with('success', 'Transaksi berhasil diperbarui.');
  }


  public function destroy(Transaction $transaction)
  {
    $transaction->delete();

    return redirect()
      ->route('transactions.index')
      ->with('success', 'Transaksi berhasil dihapus.');
  }
}
