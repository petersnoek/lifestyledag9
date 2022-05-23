<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Lifestyledag 2017',
            'location' => 'Buiten de waterpoort, Gorinchem (verzamelen op grote veld, bij je eigen trajectbegeleider)',
            'frontpage' => false, 'description' => 'Samen met andere eerstejaars studenten ga je verschillende activiteiten doen die te maken hebben met (lichamelijk en geestelijk) gezond leven.',
            'starts_at' => Carbon::create(2017, 8, 30, 8, 30, 0)->format('Y-m-d H:i:s'),
            'ends_at' => Carbon::create(2017, 8, 30, 15, 0, 0)->format('Y-m-d H:i:s'),
            'created_at' => $nu,
            'updated_at' => $nu,
            ]);
        DB::table('events')->insert([
            'id' => 2,
            'name' => 'Lifestyledag 2016',
            'frontpage' => false,
            'description' => 'Samen met andere eerstejaars studenten ga je verschillende activiteiten doen die te maken hebben met (lichamelijk en geestelijk) gezond leven.',
            'starts_at' => Carbon::create(2016, 8, 30, 8, 30, 0)->format('Y-m-d H:i:s'),
            'ends_at' => Carbon::create(2016, 8, 30, 15, 0, 0)->format('Y-m-d H:i:s'),
            'created_at' => $nu,
            'updated_at' => $nu,
            ]);

        DB::table('events')->insert([
            'id' => 3,
            'name' => 'Lifestyledag 2022',
            'frontpage' => true,
            'description' => 'Samen met andere eerstejaars studenten ga je verschillende activiteiten doen die te maken hebben met (lichamelijk en geestelijk) gezond leven.',
            'starts_at' => Carbon::create(2022, 8, 31, 8, 30, 0)->format('Y-m-d H:i:s'),
            'ends_at' => Carbon::create(2022, 8, 31, 15, 0, 0)->format('Y-m-d H:i:s'),
            'enlist_starts_at' => Carbon::create(2022, 8, 30, 8, 30, 0)->format('Y-m-d H:i:s'),
            'enlist_stops_at' => Carbon::create(2022, 8, 31, 8, 0, 0)->format('Y-m-d H:i:s'),
            'created_at' => $nu,
            'updated_at' => $nu,]);

        $this->command->info('Seeding: added 3 events');
    }
}
