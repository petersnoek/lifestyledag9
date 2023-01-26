<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nu = Carbon::now();

        DB::table('activities')->insert(['id' => 2,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Roeien', 'description' => 'Een kennismaking met roeien voor beginners.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 3,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Disneyland!', 'description' => 'Een schoolreis naar Disneyland Parijs.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 4,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Breakdance', 'description' => 'Leer breakdancen', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 5,     'event_id' => 4,   'owner_user_id' => 1, 'name' => 'test feature 53', 'description' => '', 'created_at' => $nu, 'updated_at' => $nu]);
    }
}
