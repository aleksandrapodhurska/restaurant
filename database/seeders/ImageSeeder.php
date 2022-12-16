<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nowDate = Carbon::now();

        $basic = [
            '/storage/images/logo.jpg', // Logo
            '/storage/images/berries.jpg',
            '/storage/images/box.jpg',
            '/storage/images/camomile.jpg',
            '/storage/images/cup.jpg',
            '/storage/images/cup_2.jpg',
            '/storage/images/cup_3.jpg',
            '/storage/images/donut.jpg',
            '/storage/images/img-story-1.png',
            '/storage/images/img-story-2.png',
            '/storage/images/img-story-3.png',
            '/storage/images/img-story-4.png',
        ];
        foreach ($basic as $srcKey => $src) {
            DB::table('images')->insert([
                'src' => $src,
                'created_at' => $nowDate->format('Y-m-d H:i:s'),
                'updated_at' => $nowDate->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
