<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        // Superuser
        $superuser = User::factory()->create([
            'name' => 'Super User',
            'email' => 'super@email.com'
        ]);
        $role = Role::findByName('superuser', 'admin');
        $superuser->assignRole($role);

        // Admin
        $admin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'administrator@email.com'
        ]);
        $role = Role::findByName('admin', 'admin');
        $admin->assignRole($role);

        // Manager
        $manager = User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@email.com'
        ]);
        $manager->assignRole(['manager']);

        // Waiter
        $waiter = User::factory()->create([
            'name' => 'Waiter User',
            'email' => 'waiter@email.com'
        ]);
        $waiter->assignRole(['waiter']);


        // Hostess
        $hostess = User::factory()->create([
            'name' => 'Hostess User',
            'email' => 'hostess@email.com'
        ]);
        $hostess->assignRole(['hostess']);
    }
}
