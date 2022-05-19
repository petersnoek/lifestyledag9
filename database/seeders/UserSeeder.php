<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'password' => Hash::make('test123')	
            ]
        ];
       
        foreach ($data as $key => $value) {
            User::create($value);
        }
    }
}
