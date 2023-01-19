<?php

namespace Database\Seeders;

use App\Models\enlistment;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $students = [
            [
                'first_name' => 'test',
                'last_name' => 'test',
                'email' => 'test@gmail.com',
                'class_code' => '20A5',
                'password' => '$2y$10$A24g/HB33S7.JK5kYZnc/OPpaPzUE8p6QQiv6G3QGwIB4y2RIxZhC',
            ],
            [
                'first_name' => 'Pieter',
                'last_name' => 'test',
                'email' => '99047256@mydavinci.nl',
                'email_verified_at' => now(),
                'password' => '$2y$10$qgwRljCpvoHAPFGqB6sOgelHP1Qz9Ela0SH2MNW50SKczWbPYF78W',
            ],
            [
                'first_name' => 'Student',
                'last_name' => 'test',
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
            ],
            [
                'first_name' => 'Pieter',
                'last_name' => 'workshophouder',
                'email' => '99047256@mydavinci.nl',
                'email_verified_at' => now(),
                'password' => '$2y$10$qgwRljCpvoHAPFGqB6sOgelHP1Qz9Ela0SH2MNW50SKczWbPYF78W',
            ]
        ];

        $role = Role::where('name', 'workshophouder')->first()->id;

        foreach ($workshopholders as $key => $value) {
            $user = User::create($value);
            $user->syncRoles($role);
        }
    }
}
