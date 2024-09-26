<?php

namespace Database\Seeders;

use App\Models\TransactionCategory;
use App\Models\TransactionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $incomeType = TransactionType::where('name', 'Pemasukan')->first()->id;
    $expenseType = TransactionType::where('name', 'Pengeluaran')->first()->id;

    // Tambahkan kategori pemasukan
    TransactionCategory::create(['name' => 'Business', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Investment', 'type_id' => $incomeType]);

    // Tambahkan kategori pengeluaran
    TransactionCategory::create(['name' => 'House', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Food', 'type_id' => $expenseType]);

    // TransactionCategory::factory()->count(20)->create();
  }
}
