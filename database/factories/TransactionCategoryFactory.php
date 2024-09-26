<?php

namespace Database\Factories;

use App\Models\TransactionCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionCategory>
 */
class TransactionCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = TransactionCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(
                [
                    'Bills',
                    'Car',
                    'Clothes',
                    'Travel',
                    'Food',
                    'Shooping',
                    'House',
                    'Entertaiment',
                    'Phone',
                    'Pets',
                    "Business",
                    'Invesments',
                    'Extra Income',
                    'Deposits',
                    'Lottery',
                    'Gifts',
                    'Salary',
                    'Savings',
                    'Rental Income',
                    'Other'
                ]
            )
        ];
    }
}
