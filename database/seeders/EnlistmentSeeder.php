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

        DB::table('enlistments')->insert(['id' => 1, 'event_id'=>3, 'activity_id' => 5, 'round_id' => 1, 'user_id' => 7, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['id' => 2, 'event_id'=>3, 'activity_id' => 13, 'round_id' => 1, 'user_id' => 7, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 7, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 8, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 9, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 10, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 11, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 12, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 13, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 14, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 15, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 16, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>3, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 17, 'created_at' => $nu, 'updated_at' => $nu,]);

    }
}
