<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'Table_No_'.$this->faker->randomNumber(2, false),
            'description' => $this->faker->sentence(),
            'capacity' => $this->faker->randomElement([2, 4, 6, 8]),
            'occupied' => $this->faker->boolean(10),
            'show' => $this->faker->boolean(80),
        ];
    }
}
