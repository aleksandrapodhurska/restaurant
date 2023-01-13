<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions
        $modifyUsers = Permission::create([
            'guard_name' => 'admin',
            'name' => 'modify users'
        ]);
        $editContent = Permission::create([
            'guard_name' => 'admin',
            'name' => 'edit content'
        ]);
        $managetables = Permission::create([
            'guard_name' => 'web',
            'name' => 'manage tables'
        ]);
        $managebookings = Permission::create([
            'guard_name' => 'web',
            'name' => 'manage bookings'
        ]);
        $manageorders = Permission::create([
            'guard_name' => 'web',
            'name' => 'manage orders'
        ]);

        // Create roles
        $superuserRole = Role::create([
            'guard_name' => 'admin',
            'name' => 'superuser'
        ]);
        $adminRole = Role::create([
            'guard_name' => 'admin',
            'name' => 'admin'
        ]);
        $managerRole = Role::create([
            'guard_name' => 'web',
            'name' => 'manager'
        ]);
        $waiterRole = Role::create([
            'guard_name' => 'web',
            'name' => 'waiter'
        ]);
        $hostessRole = Role::create([
            'guard_name' => 'web',
            'name' => 'hostess'
        ]);

        // Assign permissions to role
        $superuserRole->givePermissionTo($modifyUsers);
        $superuserRole->givePermissionTo($editContent);

        $adminRole->givePermissionTo($editContent);

        $managerRole->givePermissionTo($manageorders);
        $managerRole->givePermissionTo($managetables);
        $managerRole->givePermissionTo($managebookings);

        $waiterRole->givePermissionTo($manageorders);
        $waiterRole->givePermissionTo($managetables);

        $hostessRole->givePermissionTo($managetables);
        $hostessRole->givePermissionTo($managebookings);
    }
}
