<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Console\Commands\CreateRoutePermissionsCommand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            EventSeeder::class,
            EventroundSeeder::class,
            EnlistmentSeeder::class,
            ActivitySeeder::class,
            RoutePermissionsSeeder::class,
            RoleSeeder::class,
            AdminUserSeeder::class,
            UserSeeder::class
        ]);
    }
}
