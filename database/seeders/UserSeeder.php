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
        $data = [
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => '$2y$10$A24g/HB33S7.JK5kYZnc/OPpaPzUE8p6QQiv6G3QGwIB4y2RIxZhC',
            ],
            [
                'name' => 'Bas Verdoorn',
                'email' => 'basverdoorn@hotmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$WtIejhN/EWGTAR4bjxrSt.GzhykLHADApprKYDfOa6P8NUgA2ddIC',
            ],
            [
                'name' => 'Pieter',
                'email' => '99047256@mydavinci.nl',
                'email_verified_at' => now(),
                'password' => '$2y$10$qgwRljCpvoHAPFGqB6sOgelHP1Qz9Ela0SH2MNW50SKczWbPYF78W',
            ],
            [
                'name' => 'Student',
                'email' => 'student@hotmail.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$5jnlp82C7RYyWNKNEYXzPOj3su8JcCmonxpaAzLXSE6VGQncZybDm'
            ]
        ];

        $role = Role::where('name', 'student')->first()->id;

        foreach ($data as $key => $value) {
            $user = User::create($value);
            $user->syncRoles($role);
        }
    }
}
