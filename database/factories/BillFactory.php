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
     * Configure the model factory.
     *
     * @return $this
     */
//    public function configure()
//    {
//        $nowDate = \Illuminate\Support\Carbon::now()->toDateString();
//
//
////        $booking = Booking::where('date', '<', $nowDate)->inRandomOrder()->first();
//
//        return $this->afterMaking(function (Bill $bill) {
//            //
//        })->afterCreating(function (Bill $bill) {
//            $booking = Booking::inRandomOrder()->first();
//            // append booking id
////            $bill->booking()->associate($booking);
//            $booking->bill()->associate($bill);
//        });
//    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nowDate = Carbon::now()->toDateString();
        $customer = Customer::inRandomOrder()->first();
//        $booking = Booking::where('date', '<', $nowDate)->inRandomOrder()->first();
        $table = Table::inRandomOrder()->first();
        $user = User::inRandomOrder()->first();
        $status = BillStatus::inRandomOrder()->first();
        $subtotal = $this->faker->randomFloat(2, 8, 130);
        $discount = $customer->discount;
        $subtotalWithDiscount = $discount ? ($subtotal - ($subtotal * (str_replace('%', '', $discount) / 100))) : $subtotal;
        $tax = $subtotalWithDiscount * 0.13;
        $total = $subtotalWithDiscount + $tax;
        $tip = $this->faker->randomElement(['0', '5%', '7%', '12%', '17%', '20%']);
        $tips = $tip ? ($total * (str_replace('%', '', $tip) / 100)) : 0;


        return [
            'customer_id' => $customer->id,
            'booking_id' => Null,
            'table_id' => $table->id,
            'user_id' => $user->id,
            'status' => $status->id,
            'subtotal' => $subtotal,
            'promo' => Null,
            'discount' => $discount,
            'tax' => $tax,
            'total' => $total,
            'tips' => $tips,
            'balance' => $total + $tips,
            'comment' => $this->faker->text(),
        ];
    }
}
