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

        $role = Role::create(['name' => 'student','color' => '#4cbcdd']);
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

        $role = Role::create(['name' => 'workshophouder', 'color' => '#ddb44c']);
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
            "activity.destroy",
            "activity.store",
            "activity.create",
            "verification.verify",
        ])->get();
        $role->permissions()->attach($permissions);

        $role = Role::create(['name' => 'geblokkeerd', 'color' => '#dd4c4c']);
        $permissions = Permission::whereIn("name", [
            "dashboard"
        ])->get();
        $role->permissions()->attach($permissions);
        //admin gets all permissions except the permissions in the array
        $exceptAdminPermissions = [
            "permissions.create",
            "permissions.store",
            "permissions.edit",
            "permissions.update",
            "permissions.destroy"
        ];

        $role = Role::create(['name' => 'admin', 'color' => '#4c78dd']);
        $permissions = Permission::whereNotIn('name', $exceptAdminPermissions)->get(['id']);
        $role->permissions()->attach($permissions);
    }
}
