<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'manage roles']);
        Permission::create(['name' => 'manage permissions']);
        Permission::create(['name' => 'manage posts']);
        Permission::create(['name' => 'manage categories']);
        Permission::create(['name' => 'manage comments']);
        Permission::create(['name' => 'manage users']);
        Permission::create(['name' => 'manage pages']);
        Permission::create(['name' => 'manage menu items']);
        Permission::create(['name' => 'file manager']);
        Permission::create(['name' => 'logs']);
        Permission::create(['name' => 'backups']);

        // create roles and assign created permissions

        // writer has access to post & postcategory & comment modules
        $member = Role::create(['name' => 'member']);

        // writer has access to post & postcategory & comment modules
        $writer = Role::create(['name' => 'writer']);
        $writer->givePermissionTo(['manage posts', 'manage categories', 'manage comments']);

        // support has access to files & logs & backups
        $support = Role::create(['name' => 'support']);
        $support->givePermissionTo(['file manager', 'logs', 'backups']);

        // in addition to the writer role, admin has access to user & home modules
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'manage posts', 'manage categories',
            'manage comments', 'manage users',
            'manage pages', 'manage menu items'
        ]);

        // super admin has high access level
        $superAdmin = Role::create(['name' => 'super admin']);
        $superAdmin->givePermissionTo(Permission::all());
    }
}
