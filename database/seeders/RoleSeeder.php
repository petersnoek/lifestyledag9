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

        $role = Role::create(['name' => 'student']);
        $permissions = Permission::whereIn("name", [
            "dashboard",
            "event.show",
            "enlistment.store",
            "enlistment.destroy",
            "login",
            "logout",
            "password.confirm",
            "password.email",
            "password.request",
            "password.reset",
            "password.update",
            "register",
            "verification.notice",
            "verification.send",
            "verification.verify",
            "users.update2"
        ])->get();
        $role->permissions()->attach($permissions);

        $role = Role::create(['name' => 'workshophouder']);
        $permissions = Permission::whereIn("name", [
            "dashboard",
            "event.show",
            "activity.create",
            "activity.store",
            "activity.edit",
            "activity.update",
            "activity.destroy",
            "login",
            "logout",
            "password.confirm",
            "password.email",
            "password.request",
            "password.reset",
            "password.update",
            "register",
            "verification.notice",
            "verification.send",
            "activity.destroy"
            "activity.store",
            "activity.create",
            "verification.verify",
        ])->get();
        $role->permissions()->attach($permissions);

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
