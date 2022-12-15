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

        Permission::create(['name' => 'create-murid']);
        Permission::create(['name' => 'view-murid']);
        Permission::create(['name' => 'edit-murid']);
        Permission::create(['name' => 'delete-murid']);

        Permission::create(['name' => 'create-guru']);
        Permission::create(['name' => 'view-guru']);
        Permission::create(['name' => 'edit-guru']);
        Permission::create(['name' => 'delete-guru']);

        Permission::create(['name' => 'create-pelajaran']);
        Permission::create(['name' => 'view-pelajaran']);
        Permission::create(['name' => 'edit-pelajaran']);
        Permission::create(['name' => 'delete-pelajaran']);

        Permission::create(['name' => 'create-semester']);
        Permission::create(['name' => 'view-semester']);
        Permission::create(['name' => 'edit-semester']);
        Permission::create(['name' => 'delete-semester']);

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

            'create-murid',
            'view-murid',
            'edit-murid',
            'delete-murid',

            'create-guru',
            'view-guru',
            'edit-guru',
            'delete-guru',

            'create-pelajaran',
            'view-pelajaran',
            'edit-pelajaran',
            'delete-pelajaran',

            'create-semester',
            'view-semester',
            'edit-semester',
            'delete-semester',

        ]);
    }
}
