<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\BillStatus;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Table;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $customer = Customer::inRandomOrder()->first();
        $table = Table::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $discount = $customer->discount;

        return [
            'customer_id' => $customer->id,
            'booking_id' => Null,
            'table_id' => $table->id,
            'user_id' => $user->id,
            'status' => 4,
            'subtotal' => 0,
            'promo' => Null,
            'discount' => $discount,
            'tax' => 0,
            'total' => 0,
            'tips' => 0,
            'balance' => 0,
            'comment' => $this->faker->text(),
        ];
    }
}
