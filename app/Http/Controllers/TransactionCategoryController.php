<?php

namespace App\Http\Controllers;

use App\Models\TransactionCategory;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionCategoryController extends Controller
{
  public function index()
  {
    $categories = TransactionCategory::latest()->paginate(10);

    return view('transactions.category.index', compact('categories'));
  }

  public function create()
  {
    $types = TransactionType::all();

    return view('transactions.category.add', compact('types'));
  }

  public function store(Request $request)
  {

    $request->validate([
      'name' => 'required|min:3',
      'type_id'          => 'required|exists:transaction_types,id',
    ]);

    TransactionCategory::create($request->all());

    return redirect()
      ->route("transactions.category.index")
      ->with('success', 'Kategori  berhasil ditambahkan.');
  }

  public function edit($id)
  {
    $category = TransactionCategory::findOrFail($id);
    $types = TransactionType::all();


    return view('transactions.category.edit', compact('category', 'types'));
  }


  public function update(Request $request, TransactionCategory $category)
  {
    $request->validate([
      'name' => 'required|min:3',
      'type_id'          => 'required|exists:transaction_types,id',
    ]);

    $category->update($request->all());

    return redirect()
      ->route("transactions.category.index")
      ->with('success', 'Kategori berhasil diperbarui.');
  }

  public function destroy(TransactionCategory $category)
  {
    $category->delete();

    return redirect()
      ->route('transactions.category.index')
      ->with('success', 'Kategori berhasil dihapus.');
  }
}
