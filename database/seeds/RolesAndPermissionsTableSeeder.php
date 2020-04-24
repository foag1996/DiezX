<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

                Permission::create(['name' => 'View posts', 'guard_name' => 'web']);
                Permission::create(['name' => 'Create posts', 'guard_name' => 'web']);
                Permission::create(['name' => 'Update posts', 'guard_name' => 'web']);
                Permission::create(['name' => 'Delete posts', 'guard_name' => 'web']);

                Permission::create(['name' => 'Create comment', 'guard_name' => 'web']);
                Permission::create(['name' => 'Update comment', 'guard_name' => 'web']);



                $role = Role::create(['name' => 'User', 'guard_name' => 'web'])
                ->givePermissionTo(['Create comment', 'Update comment']);
                $role = Role::create(['name' => 'Admin', 'guard_name' => 'web']);
                $role->givePermissionTo(Permission::all());



    }
}
