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
        // Roles and Permissions
        $this->call(RoleAndPermissionSeeder::class);


        // Images
        $this->call(ImageSeeder::class);

        // Users
        $this->call(UserSeeder::class);
        // Categories
        $this->call(CategorySeeder::class);

        // Menus
        $this->call(MenuSeeder::class);

        // Menu Items
        $this->call(MenuItemSeeder::class);

        // Booking statuses
        $this->call(BookingStatusSeeder::class);

        // Customers seeder
        $this->call(CustomerSeeder::class);

        // Tables seeder
        $this->call(TableSeeder::class);

        // Bookings seeder
        $this->call(BookingSeeder::class);

        // Transaction modes
        $this->call(TranactionModeSeeder::class);

        // Bill statuses
        $this->call(BillStatusSeeder::class);

        // Bills
        $this->call(BillSeeder::class);

        // Order statuses
        $this->call(OrderStatusSeeder::class);

        // Orders
        $this->call(OrderSeeder::class);

        // Transactions

    }
}
