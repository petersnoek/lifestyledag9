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
        $roleSet1 = Permission::whereIn("name", ["welcome", "dashboard"])->get();

        // $role = Role::create(['name' => 'student']);
        // $permissions = $roleSet1->merge(Permission::whereIn("name", ["welcome", "dashboard"])->get());
        // $permissions = $roleSet1;
        // $role->permissions()->attach($permissions);

        $role = Role::create(['name' => 'student']);
        $permissions = Permission::whereIn("name", [
            "dashboard",
            "activity.index",
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
            "verification.verify"
        ])->get();
        $role->permissions()->attach($permissions);

        $role = Role::create(['name' => 'workshophouder']);
        $permissions = Permission::whereIn("name", [
            "aanmelden.end",
            "aanmelden.index",
            "aanmelden.show",
            "dashboard",
            "activity.index",
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
            "activity.create",
            "activity.store"
        ])->get();
        $role->permissions()->attach($permissions);

        // $role = Role::create(['name' => 'workshophouderbeheerder']);
        // $permissions = Permission::pluck('id','id')->all();
        // $role->syncPermissions($permissions);

        // $role = Role::create(['name' => 'ontwikkelaar']);
        // $permissions = Permission::pluck('id','id')->all();
        // $role->syncPermissions($permissions);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
    }
}
