<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions1 = Permission::create([
            'name'=>'add_admin'
        ]);

        $permissions2 = Permission::create([
            'name'=>'update_admin'
        ]);

        $permissions3 = Permission::create([
            'name'=>'delete_admin'
        ]);
        $permissions4 = Permission::create([
            'name'=>'control_user_power'
        ]);
        $role1 = Role::create([
            'name'=>'super_admin'
        ]);
        $role1->givePermissionTo($permissions1);
        $role1->givePermissionTo($permissions2);
        $role1->givePermissionTo($permissions3);
        $role1->givePermissionTo($permissions4);

        $role2 = Role::create([
            'name'=>'sub_admin'
        ]);
    }
}
