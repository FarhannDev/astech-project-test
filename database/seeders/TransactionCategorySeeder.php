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

    //  kategori pemasukan
    TransactionCategory::create(['name' => 'Business', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Investment', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Extra Income', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Deposits', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Lottery', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Gifts', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Salary', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Savings', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Rental Income', 'type_id' => $incomeType]);
    TransactionCategory::create(['name' => 'Other', 'type_id' => $incomeType]);

    //  kategori pengeluaran
    TransactionCategory::create(['name' => 'House', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Food', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Bills', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Car', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Clothes', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Travel', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Food', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Shooping', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Entertaiment', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Phone', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Pets', 'type_id' => $expenseType]);
    TransactionCategory::create(['name' => 'Other', 'type_id' => $expenseType]);

    // TransactionCategory::factory()->count(20)->create();
  }
}
