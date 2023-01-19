<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'first_name' => 'Admin',
                'last_name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$lnA9B4HuQvixVrktB8dLSOksmbhhCCoUuQGS7PXmORvTeM/SLxuKC'
            ]
        ];

        $role = Role::where(['name' => 'admin'])->first()->id;

        foreach ($data as $key => $value) {
            $user = User::create($value);
            $user->syncRoles($role);
        }
    }
}
