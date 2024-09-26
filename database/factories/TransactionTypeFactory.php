<?php

namespace Database\Factories;

use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionType>
 */
class TransactionTypeFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */

  protected $model = TransactionType::class;

  public function definition(): array
  {
    return [
      'name' => $this->faker->randomElement(['Pemasukan', 'Pengeluaran'])
    ];
  }
}
