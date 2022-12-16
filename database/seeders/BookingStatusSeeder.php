<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'pending',
            'confirmed',
            'cancelled by the customer',
            'cancelled by the company',
            'fulfilled'
        ];

        foreach ($statuses as $status) {
            DB::table('booking_statuses')->insert([
                'status' => $status
            ]);
        }
    }
}
