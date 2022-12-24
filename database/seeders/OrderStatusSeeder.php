<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'new',
            'accepted by the kitchen',
            'cancelled by the customer',
            'cancelled by the company',
            'ready and not served',
            'served',
            'returned by the customer',
            'other'
        ];

        foreach ($statuses as $status) {
            DB::table('order_statuses')->insert([
                'status' => $status
            ]);
        }
    }
}
