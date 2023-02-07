<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nu = Carbon::now();

        DB::table('events')->insert([
            'id' => 1,
            'name' => 'Lifestyledag 2021',
            'location' => 'Buiten de waterpoort, Gorinchem (verzamelen op grote veld, bij je eigen trajectbegeleider)',
            'description' => 'Samen met andere eerstejaars studenten ga je verschillende activiteiten doen die te maken hebben met (lichamelijk en geestelijk) gezond leven.',
            'date' => Carbon::create(2021, 8, 30)->format('Y-m-d'),
            'starts_at' => Carbon::create(0,0,0, 8, 30, 0)->format('H:i:s'),
            'ends_at' => Carbon::create(0,0,0, 15, 0, 0)->format('H:i:s'),
            'enlist_starts_at' => Carbon::create(2021, 8, 30, 8, 30, 0)->format('Y-m-d H:i:s'),
            'enlist_stops_at' => Carbon::create(2021, 8, 31, 8, 0, 0)->format('Y-m-d H:i:s'),
            'created_at' => $nu,
            'updated_at' => $nu,
        ]);

        DB::table('events')->insert([
            'id' => 3,
            'name' => 'Lifestyledag 2022',            
            'description' => 'Samen met andere eerstejaars studenten ga je verschillende activiteiten doen die te maken hebben met (lichamelijk en geestelijk) gezond leven.',
            'date' => Carbon::create(2022, 8, 31,)->format('Y-m-d'),
            'starts_at' => Carbon::create(0,0,0, 8, 30, 0)->format('H:i:s'),
            'ends_at' => Carbon::create(0,0,0, 15, 0, 0)->format('H:i:s'),
            'enlist_starts_at' => Carbon::create(2022, 8, 30, 8, 30, 0)->format('Y-m-d H:i:s'),
            'enlist_stops_at' => Carbon::create(2022, 8, 31, 8, 0, 0)->format('Y-m-d H:i:s'),
            'created_at' => $nu,
            'updated_at' => $nu,
        ]);

        DB::table('events')->insert([
            'id' => 4,
            'name' => 'Lifestyledag 2023',            
            'description' => 'Samen met andere eerstejaars studenten ga je verschillende activiteiten doen die te maken hebben met (lichamelijk en geestelijk) gezond leven.',
            'date' => Carbon::create(2023, 8, 31,)->format('Y-m-d'),
            'starts_at' => Carbon::create(0,0,0, 8, 30, 0)->format('H:i:s'),
            'ends_at' => Carbon::create(0,0,0, 15, 0, 0)->format('H:i:s'),
            'enlist_starts_at' => Carbon::yesterday(),
            'enlist_stops_at' => Carbon::tomorrow(),
            'created_at' => $nu,
            'updated_at' => $nu,
        ]);
    }
}
