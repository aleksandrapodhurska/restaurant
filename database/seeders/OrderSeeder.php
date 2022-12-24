<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory(40)->create();

//        $orders = Order::all();

//        foreach ($orders as $key => $order) {
//            $bill = Bill::find($order->bill_id);
//
//
//        }
    }
}
