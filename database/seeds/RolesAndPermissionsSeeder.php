<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Reset cached roles and permissions
    app()['cache']->forget('spatie.permission.cache');

    $role = Role::create(['name' => 'super-admin']);
    $role->givePermissionTo(Permission::all());
    }
}
