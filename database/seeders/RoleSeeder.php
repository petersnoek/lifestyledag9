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

        // $permissionnames = [
        //     'aanmelden.end',
        //     'aanmelden.index',
        //     'aanmelden.show',
        //     'contacts.index',
        //     'dashboard',
        //     'event.show',
        //     'login',
        //     'logout',
        //     'password.confirm',
        //     'password.email',
        //     'password.request',
        //     'password.reset',
        //     'password.update',
        //     'permissions.create',
        //     'permissions.destroy',
        //     'permissions.edit',
        //     'permissions.index',
        //     'permissions.show',
        //     'permissions.store',
        //     'permissions.update',
        //     'register',
        //     'roles.create',
        //     'roles.destroy',
        //     'roles.edit',
        //     'roles.index',
        //     'roles.show',
        //     'roles.store',
        //     'roles.update',
        //     'settings',
        //     'users.edit',
        //     'users.index',
        //     'users.show',
        //     'users.update',
        //     'verification.notice',
        //     'verification.send',
        //     'verification.verify',
        // ];

        $role = Role::create(['name' => 'student']);
        $permissions = Permission::whereIn("name", [
            "dashboard",
            "event.show",
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
            "verification.verify"
        ])->get();
        $role->permissions()->attach($permissions);

        $role = Role::create(['name' => 'workshophouder']);
        $permissions = Permission::whereIn("name", [
            "aanmelden.end",
            "aanmelden.index",
            "aanmelden.show",
            "dashboard",
            "event.show",
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
            "verification.verify"
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
