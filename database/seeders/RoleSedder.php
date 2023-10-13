<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(["name"=>"admin"]);
        $role2 = Role::create(["name"=>"financiero"]);
        $role3 = Role::create(["name"=>"aspirante"]);

      /**  Permission::create(["name"=>"dashboard"])->assignRole($role1);
        *Permission::create(["name"=>"finanzas"])->assignRole($role2);
        *Permission::create(["name"=>"solicitud"])->assignRole($role3);
        *Permission::create(["name"=>"admin.solicitud"])->assignRole($role1); **/
    }
}
