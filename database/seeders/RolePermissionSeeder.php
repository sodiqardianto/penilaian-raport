<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'access-role']);
        Permission::create(['name' => 'create-role']);
        Permission::create(['name' => 'view-role']);
        Permission::create(['name' => 'edit-role']);
        Permission::create(['name' => 'delete-role']);

        Permission::create(['name' => 'create-permission']);
        Permission::create(['name' => 'view-permission']);
        Permission::create(['name' => 'edit-permission']);
        Permission::create(['name' => 'delete-permission']);

        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'edit-user']);
        Permission::create(['name' => 'delete-user']);

        $role_admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        $role_admin->givePermissionTo([
            'create-role',
            'view-role',
            'edit-role',
            'delete-role',
            'access-role',

            'create-permission',
            'view-permission',
            'edit-permission',
            'delete-permission',

            'create-user',
            'view-user',
            'edit-user',
            'delete-user',
        ]);
    }
}
