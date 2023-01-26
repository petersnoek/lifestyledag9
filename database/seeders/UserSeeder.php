<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $students = [
            [
                'first_name' => 'Student',
                'insertion' => 'de',
                'last_name' => 'student',
                'email' => 'student@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$5jnlp82C7RYyWNKNEYXzPOj3su8JcCmonxpaAzLXSE6VGQncZybDm',
            ]
        ];

        $role = Role::where('name', 'student')->first()->id;

        foreach ($students as $key => $value) {
            $user = User::create($value);
            $user->syncRoles($role);
        }

        $workshopholders = [
            [
                'first_name' => 'Workshophouder',
                'last_name' => 'test',
                'email' => 'workshophouder@gmail.com',
                'password' => '$2y$10$XVD0huqiYWSc8JrfXaWiKeatdaYlvTeSUvsv4N1N9so0Oabo97IMK',
            ]
        ];

        $role = Role::where('name', 'workshophouder')->first()->id;

        foreach ($workshopholders as $key => $value) {
            $user = User::create($value);
            $user->syncRoles($role);
        }

        $admin = [
            [
                'first_name' => 'Admin',
                'last_name' => 'test',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$lnA9B4HuQvixVrktB8dLSOksmbhhCCoUuQGS7PXmORvTeM/SLxuKC'
            ]
        ];

        $role = Role::where(['name' => 'admin'])->first()->id;

        foreach ($admin as $key => $value) {
            $user = User::create($value);
            $user->syncRoles($role);
        }
    }
}
