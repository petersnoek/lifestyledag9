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
            RoutePermissionsSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ContactSeeder::class,
            EventSeeder::class,
            EventroundSeeder::class,
            ActivitySeeder::class,
            ActivityRoundsSeeder::class,
            EnlistmentSeeder::class
        ]);
    }
}
