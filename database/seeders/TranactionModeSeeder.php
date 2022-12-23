<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranactionModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modes = [
            'cash',
            'debit card',
            'credit card',
            'check',
            'mobile payment',
            'gift card',
            'coupon'
        ];

        foreach ($modes as $mode) {
            DB::table('transaction_modes')->insert([
                'name' => $mode,
                'description' => ''
            ]);
        }
    }
}
