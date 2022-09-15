<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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


        DB::table('activities')->insert(['id' => 1,     'event_id' => 2,   'executed_by' => 'De kickbox trainer', 'name' => 'Kickboxing', 'description' => 'Een kickbox workshop voor beginners.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 2,     'event_id' => 2,   'executed_by' => 'De roeitrainer', 'name' => 'Roeien', 'description' => 'Een kennismaking met roeien voor beginners.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 3,     'event_id' => 3,   'executed_by' => 'Marc & Peter', 'name' => 'Disneyland!', 'description' => 'Een schoolreis naar Disneyland Parijs.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 4,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Breakdance', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 5,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Fietstocht', 'description' => 'Neem je eigen fiets mee.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 6,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Fitness', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 7,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Crossfit/bootcamp', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 8,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Kickboksen', 'description' => '(later toevoegen)','created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 9,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Spinning', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 10,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Hardlopen', 'description' => 'Beginners en gevorderden.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 11,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Beachvolleybal', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 12,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Stadswandeling', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 13,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Casting', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 14,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Unihockey', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 15,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Roeien', 'description' => '(zorg dat je op de fiets komt of bij iemand achterop kunt; je moet kunnen zwemmen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 16,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Bamboebouwen', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 17,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Voetbal', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 18,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'In Control', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 19,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Zumba/Core training/Aerobics', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 20,    'event_id' => 1,   'executed_by' => 'Dirk-Jan Bartels', 'name' => 'Bootcamp', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 21,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Yoga', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 22,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Dans workshop', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 23,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Trampoline', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 24,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Balancebikes', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 25,    'event_id' => 1,   'executed_by' => 'Monica', 'name' => 'Bootcamp', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 26,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Jeet Kune Do (vechtsport)', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 27,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Weerbaarheid', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 28,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Pannakooi', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 29,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Drama workshop', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 30,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'DJ Workshop', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 31,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Muziek workshop', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 32,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Design workshop', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 33,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Curves', 'description' => '(alleen voor vrouwen)',  'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 34,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Tai Chi', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 35,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'WeHelpen', 'description' => 'een originele hulpactie verzinnen (iemand helpen), uitvoeren, en daar een vlog van maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
    }
}
