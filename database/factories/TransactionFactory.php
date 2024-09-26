<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\TransactionCategory;
use App\Models\TransactionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Transaction::class;

    public function definition(): array
    {
        return [
            'type_id' => TransactionType::inRandomOrder()->first()->id,
            'category_id' => TransactionCategory::inRandomOrder()->first()->id,
            'amount' => $this->faker->randomFloat(2, 10, 1000),
            'transaction_date' => $this->faker->date(),
        ];
    }
}
