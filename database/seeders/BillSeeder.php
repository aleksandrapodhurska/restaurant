<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowDate = Carbon::now()->toDateString();
        $pastBookings = Booking::where('date', '<', $nowDate)->get();

        foreach ($pastBookings as $key => $booking) {
            Bill::factory()->create();
            $bill = Bill::find($key + 1);
            $bill->booking()->associate($booking);
            $bill->save();
        }
    }
}
