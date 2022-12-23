<?php

namespace Database\Factories;

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
    public function definition()
    {
        return [
            'bill_id' => 0,
            'amount' => $this->faker->randomFloat(2, 8, 130),
            'mode_id' => 0,
            'status' => $this->faker->boolean(90)
        ];
    }
}
