<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnlistmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nu = Carbon::now();

        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 2, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 3, 'user_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 2, 'round_id' => 1, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 2, 'round_id' => 2, 'user_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 2, 'round_id' => 3, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 3, 'round_id' => 1, 'user_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 3, 'round_id' => 2, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 3, 'round_id' => 3, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
    }
}
