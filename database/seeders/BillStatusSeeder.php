<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'opened',
            'cancelled by the customer',
            'cancelled by the company',
            'closed'
        ];

        foreach ($statuses as $status) {
            DB::table('bill_statuses')->insert([
                'status' => $status
            ]);
        }
    }
}
