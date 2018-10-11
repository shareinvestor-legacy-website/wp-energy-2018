<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $modules = config('user.auth');

        foreach ($modules as $module) {
            foreach($module['permissions'] as $permission => $desc) {
                Permission::create(['name' => $permission]);
            }
        }

        $role = Role::create(['name' => 'admin']) ;

        $permissions = Permission::all()->pluck('name');
        $role->syncPermissions( $permissions);


    }
}
