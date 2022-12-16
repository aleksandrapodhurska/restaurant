<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // Reference on how to call other seeders in sequence
        // Users
        $this->call(UserSeeder::class);

        // Users
        $this->call(ImageSeeder::class);
        
        // Categories
        $this->call(CategorySeeder::class);

        // Menus
        $this->call(MenuSeeder::class);
        
        // Menu Items
        $this->call(MenuItemSeeder::class);

         
        // // category_menu_item Relationship
        // $this->call(CategoryMenuItemSeeder::class);
    }
}