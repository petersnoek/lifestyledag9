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

        DB::table('activities')->insert(['id' => 1,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Kickboxing', 'description' => 'Een kickbox workshop voor beginners.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 2,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Roeien', 'description' => 'Een kennismaking met roeien voor beginners.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 3,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Disneyland!', 'description' => 'Een schoolreis naar Disneyland Parijs.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 4,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Breakdance', 'description' => 'Leer breakdancen', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 5,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Fietstocht', 'description' => 'Neem je eigen fiets mee.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 6,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Fitness', 'description' => 'Conditie opbouwen door fitnessoefeningen te doen', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 7,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Crossfit/bootcamp', 'description' => 'Fitness maar dan veel zwaarder', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 8,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Kickboksen', 'description' => 'Leer kickboksen', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 9,     'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Spinning', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 10,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Hardlopen', 'description' => 'Beginners en gevorderden.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 11,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Beachvolleybal', 'description' => 'Lekker volleyballen aan het water', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 12,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Stadswandeling', 'description' => 'Een leuke wandeling door gorinchem', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 13,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Casting', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 14,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Unihockey', 'description' => 'Zaalhockey met een bal', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 15,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Roeien', 'description' => '(zorg dat je op de fiets komt of bij iemand achterop kunt; je moet kunnen zwemmen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 16,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Bamboebouwen', 'description' => 'Leer samenwerking door het bouwen aan een bamboetoren', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 17,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Voetbal', 'description' => 'In 2 teams achter een bal aan rennen', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 18,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'In Control', 'description' => 'Een training over zelf opkomst en rustig blijven in stressvolle situaties', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 19,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Zumba/Core training/Aerobics', 'description' => 'Verschillende fitnes activiteiten', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 20,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Bootcamp', 'description' => 'Een zware fitness test waar je uithuidings vermogen getest zal worden', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 21,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Yoga', 'description' => 'Lekker relaxen door verschillende yoga oefeningen', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 22,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Dans workshop', 'description' => 'Leer leuke dancemoves', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 23,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Trampoline', 'description' => 'Sprinkunstjes leren op de trampoline', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 24,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Balancebikes', 'description' => 'Kun jij overeind blijven?', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 25,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Bootcamp', 'description' => 'De ultieme uithoudings vermogen test', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 26,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Jeet Kune Do (vechtsport)', 'description' => 'Leer deze vechtkunst ontwikkeld door de enige echte Bruce Lee!', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 27,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Weerbaarheid', 'description' => 'Leer van je af weren', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 28,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Pannakooi', 'description' => '(later toevoegen)', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 29,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Drama workshop', 'description' => 'Leer acteren', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 30,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'DJ Workshop', 'description' => 'Maak het publiek gek met je dj moves', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 31,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Muziek workshop', 'description' => 'Leer muziek maken', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 32,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Design workshop', 'description' => 'Leer ontwerpen maken', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 33,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Curves', 'description' => '(alleen voor vrouwen)',  'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 34,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'Tai Chi', 'description' => 'Leer deze traditioneel chinese vechtkunst', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 35,    'event_id' => 3,   'owner_user_id' => 1, 'name' => 'WeHelpen', 'description' => 'een originele hulpactie verzinnen (iemand helpen), uitvoeren, en daar een vlog van maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
    }
}
