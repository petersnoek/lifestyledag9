<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nu = Carbon::now();
        $tienuur = Carbon::create(0, 0, 0, 10, 0, 0)->format('H:i:s');
        $elfuur = Carbon::create(0, 0, 0, 11, 0, 0)->format('H:i:s');
        $twaalfuur = Carbon::create(0, 0, 0, 12, 0, 0)->format('H:i:s');
        $eenuur = Carbon::create(0, 0, 0, 13, 0, 0)->format('H:i:s');
        $tweeuur = Carbon::create(0, 0, 0, 14, 0, 0)->format('H:i:s');
        $drieuur = Carbon::create(0, 0, 0, 15, 0, 0)->format('H:i:s');

        DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 1, 'start_time' => $tienuur, 'end_time' => $elfuur, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 2, 'start_time' => $elfuur, 'end_time' => $twaalfuur, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 3, 'start_time' => $eenuur, 'end_time' => $tweeuur, 'created_at' => $nu, 'updated_at' => $nu,]);


        DB::table('eventrounds')->insert(['event_id' => 3, 'round' => 1, 'start_time' => $tienuur, 'end_time' => $elfuur, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventrounds')->insert(['event_id' => 3, 'round' => 2, 'start_time' => $elfuur, 'end_time' => $twaalfuur, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventrounds')->insert(['event_id' => 3, 'round' => 3, 'start_time' => $eenuur, 'end_time' => $tweeuur, 'created_at' => $nu, 'updated_at' => $nu,]);

        $this->command->info('Seeding: added 3 eventrounds for event 1');
        $this->command->info('Seeding: added 3 eventrounds for event 3');
    }
}
