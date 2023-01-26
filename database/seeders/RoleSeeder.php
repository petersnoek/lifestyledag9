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
        // var_export(Permission::pluck('name')->all()); //log all the permissions in de console

        $role = Role::create(['name' => 'student']);
        $permissions = Permission::whereIn("name", [
            "dashboard",
            "event.show",
            "enlistment.store",
            "enlistment.destroy",
            "login",
            "logout",
            "register",
            "settings",
            "users.update2",
            "password.confirm",
            "password.email",
            "password.request",
            "password.reset",
            "password.update",
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
            "login",
            "logout",
            "register",
            "settings",
            "users.update2",
            "password.confirm",
            "password.email",
            "password.request",
            "password.reset",
            "password.update",
            "verification.notice",
            "verification.send",
            "activity.destroy",
            "activity.store",
            "activity.create",
            "verification.verify",
        ])->get();
        $role->permissions()->attach($permissions);

        //admin gets all permissions except the permissions in the array
        $exceptAdminPermissions = [
            "permissions.index",
            "permissions.show",
            "permissions.create",
            "permissions.store",
            "permissions.edit",
            "permissions.update",
            "permissions.destroy",
            "roles.index",
            "roles.show",
            "roles.create",
            "roles.edit",
            "roles.update",
            "roles.destroy"
        ];

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::whereNotIn('name', $exceptAdminPermissions)->get(['id']);
        $role->permissions()->attach($permissions);
    }
}
