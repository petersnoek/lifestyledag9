<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ContactSeeder::class,
            InviteSeeder::class,
            EventSeeder::class,
            EventroundSeeder::class,
            EnlistmentSeeder::class,
            ActivitySeeder::class,
            UserSeeder::class
        ]);
    }
}
