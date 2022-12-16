<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryMenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuItems = MenuItem::all();
        $faker = \Faker\Factory::create();

        foreach ($menuItems as $itemKey => $item) {
            $item->categories()->sync([
                $faker->randomDigitNot(0), 
                $faker->randomDigitNot(0), 
                $faker->randomDigitNot(0), 
                $faker->randomDigitNot(0)
            ]);
        }
    }
}
