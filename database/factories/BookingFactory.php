<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = Carbon::create($this->faker->dateTimeThisYear())->toDateString();
        $time = Carbon::create($this->faker->dateTimeThisYear())->toTimeString();
        $table = \App\Models\Table::inRandomOrder()->first();
        $customer = \App\Models\Customer::inRandomOrder()->first();
        $status = \App\Models\BookingStatus::inRandomOrder()->first();

        return [
            'customer_id' => $customer->id,
            'table_id' => $table->id,
            'date' => $date,
            'time' => $time,
            'description' => $this->faker->sentence(),
            'adults' => $this->faker->randomDigitNotNull(),
            'children' => $this->faker->randomElement([0, 1, 2, 3, 4]),
            'infants' => $this->faker->randomElement([0, 1, 2, 3, 4]),
            'status' => $status,
        ];
    }
}
