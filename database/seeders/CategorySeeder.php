<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $nowDate = Carbon::now();
        $faker = \Faker\Factory::create();

        $categories = [
            'category_1',
            'category_2',
            'category_3',
            'category_4',
            'category_5',
            'category_6',
            'category_7',
            'category_8',
            'category_9',
        ];

        foreach ($categories as $categoryKey => $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'description' => $faker->sentence(15),
                'show' => $faker->boolean(),
                'created_at' => $nowDate->format('Y-m-d H:i:s'),
                'updated_at' => $nowDate->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
