<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission::whereIn("name", [])->get();

        // var_export(Permission::pluck('name')->all());

        // $role = Role::create(['name' => 'workshophouder']);
        // $permissions = $roleSet1->merge(Permission::whereIn("name", ["aanmelden.index", "aanmelden.show", "aanmelden.end"])->get());
        // $role->syncPermissions($permissions);

        // $role = Role::create(['name' => 'workshophouderbeheerder']);
        // $permissions = Permission::pluck('id','id')->all();
        // $role->permissions()->attach($permissions);

        // $role = Role::create(['name' => 'ontwikkelaar']);
        // $permissions = Permission::pluck('id','id')->all();
        // $role->permissions()->attach($permissions);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->permissions()->attach($permissions);
    }
}
