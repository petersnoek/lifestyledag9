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
                'first_name' => 'Bas',
                'last_name' => 'Verdoorn',
                'email' => 'basverdoorn@hotmail.com',
                'class_code' => '20A5',
                'email_verified_at' => now(),
                'password' => '$2y$10$WtIejhN/EWGTAR4bjxrSt.GzhykLHADApprKYDfOa6P8NUgA2ddIC',
            ],
            [
                'first_name' => 'Pieter',
                'last_name' => 'pieter',
                'email' => 'student@gmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$5jnlp82C7RYyWNKNEYXzPOj3su8JcCmonxpaAzLXSE6VGQncZybDm'
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
                'last_name' => 'workshophouder',
                'email' => 'workshophouder@gmail.com',
                'password' => '$2y$10$XVD0huqiYWSc8JrfXaWiKeatdaYlvTeSUvsv4N1N9so0Oabo97IMK',
            ],
            [
                'name' => 'Pieter',
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
