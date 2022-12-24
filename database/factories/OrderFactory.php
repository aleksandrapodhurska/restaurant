<?php

namespace Database\Factories;

use App\Models\Bill;
use App\Models\Job;
use App\Models\MenuItem;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Order $order) {
            //
        })->afterCreating(function (Order $order) {
            // Fulfill the order's data
            $bill = Bill::find($order->bill_id);
            $subtotal = $bill->subtotal + $order->total;
            $discount = $bill->discount;
            $subtotalWithDiscount = $discount ? ($subtotal - ($subtotal * (str_replace('%', '', $discount) / 100))) : $subtotal;
            $tax = $subtotalWithDiscount * 0.13;
            $total = $subtotalWithDiscount + $tax;
            $tip = $this->faker->randomElement(['0', '5%', '7%', '12%', '17%', '20%']);
            $tips = $tip ? ($total * (str_replace('%', '', $tip) / 100)) : 0;

            DB::table('bills')
                ->where('id', $bill->id)
                ->update([
                    'subtotal' => $subtotal,
                    'tax' => $tax,
                    'total' => $total,
                    'tips' => $tips,
                    'balance' => $total + $tips,
                ]);

            // Create jobs
            for ($i = 0; $i < $order->quantity; $i++) {
                DB::table('jobs')->insert([
                    'bill_id' => $bill->id,
                    'menu_item_id' => $order->menu_item_id,
                    'comment' => $bill->comment,
                    'status' => 6
                ]);
                $job = DB::table('jobs')->latest('ID')->first();
                $order->jobs()->attach($job->id);
            }

        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $bill = Bill::inRandomOrder()->first();
        $menuItem = MenuItem::inRandomOrder()->first();
        $price = $menuItem->price;
        $quantity = $this->faker->randomElement([1, 2, 3]);
        $total = $price * $quantity;

        return [
            'bill_id' => $bill->id,
            'menu_item_id' => $menuItem->id,
            'quantity' => $quantity,
            'price' => $menuItem->price,
            'total' => $total,
            'discount' => 0,
        ];
    }
}
