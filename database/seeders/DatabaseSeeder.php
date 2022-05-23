<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints

        DB::table('users')->truncate();
        DB::table('users')->insert(['id' => 1, 'name' => 'Peter', 'email' => 'peter.snoek@gmail.com', 'password' => '$2y$10$DJnz/7teSHZrlacX5z6gs.TUGsDgwgVK4CnwQgabXlU.zX.0Eid0a', 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 2, 'name' => 'Organisatie', 'email' => 'organisatie@lifestyledag.nl', 'password' => '$2y$10$12pj7ZFhfUILTHO4wYpfVOE3iizz.Yf8.fHIsr8T1m72HoHNCTr02',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 3, 'name' => 'kickbox-trainer', 'email' => 'kickbox@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 4, 'name' => 'roeitrainer', 'email' => 'roeien@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 5, 'name' => 'disney17', 'email' => 'disney17@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 6, 'name' => 'docent1', 'email' => 'docent1@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 7, 'name' => 'student1', 'email' => 'student1@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 8, 'name' => 'student2', 'email' => 'student2@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 9, 'name' => 'student3', 'email' => 'student3@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 10, 'name' => 'student4', 'email' => 'student4@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 11, 'name' => 'student5', 'email' => 'student5@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 12, 'name' => 'docent2', 'email' => 'docent2@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 13, 'name' => 'student6', 'email' => 'student6@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 14, 'name' => 'student7', 'email' => 'student7@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('users')->insert(['id' => 15, 'name' => 'student8', 'email' => 'student8@lifestyledag.nl', 'password' => '$2y$10$1Qx8K5PSzCs447eSiMr.3ur4ozRDlBoZhBeZtVkmcXsOs46LgtjOa',   /* Studentje1 */ 'remember_token' => null, 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('events')->truncate();
        DB::table('events')->insert(['id' => 1, 'name' => 'Lifestyledag 2017', 'location' => 'Buiten de waterpoort, Gorinchem (verzamelen op grote veld, bij je eigen trajectbegeleider)', 'frontpage' => true, 'description' => 'Samen met andere eerstejaars studenten ga je verschillende activiteiten doen die te maken hebben met (lichamelijk en geestelijk) gezond leven.', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/200x200/000/fff', 'starts_at' => Carbon::create(2017, 8, 30, 8, 30, 0)->format('Y-m-d H:i:s'), 'ends_at' => Carbon::create(2017, 8, 30, 15, 0, 0)->format('Y-m-d H:i:s'), 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('events')->insert(['id' => 2, 'name' => 'Lifestyledag 2016', 'frontpage' => true, 'description' => 'Samen met andere eerstejaars studenten ga je verschillende activiteiten doen die te maken hebben met (lichamelijk en geestelijk) gezond leven.', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/200x200/000/fff', 'starts_at' => Carbon::create(2016, 8, 30, 8, 30, 0)->format('Y-m-d H:i:s'), 'ends_at' => Carbon::create(2016, 8, 30, 15, 0, 0)->format('Y-m-d H:i:s'), 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('events')->insert(['id' => 3, 'name' => 'Disneyland 2017', 'frontpage' => true, 'description' => 'Een internationale excursie naar Disneyland Parijs.', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/200x200/000/fff', 'starts_at' => Carbon::create(2016, 8, 30, 8, 30, 0)->format('Y-m-d H:i:s'), 'ends_at' => Carbon::create(2016, 8, 30, 15, 0, 0)->format('Y-m-d H:i:s'), 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('activities')->truncate();
        DB::table('activities')->insert(['id' => 1,     'event_id' => 2,   'executed_by' => 'De kickbox trainer', 'name' => 'Kickboxing', 'description' => 'Een kickbox workshop voor beginners.', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 2,     'event_id' => 2,   'executed_by' => 'De roeitrainer', 'name' => 'Roeien', 'description' => 'Een kennismaking met roeien voor beginners.', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 3,     'event_id' => 3,   'executed_by' => 'Marc & Peter', 'name' => 'Disneyland!', 'description' => 'Een schoolreis naar Disneyland Parijs.', 'banner_image' => '/img/disney.jpg', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 4,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Breakdance', 'description' => '(later toevoegen)', 'banner_image' => '/img/breakdance.jpg', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 5,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Fietstocht', 'description' => 'Neem je eigen fiets mee.', 'banner_image' => '/img/fietstocht.jpg', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 6,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Fitness', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 7,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Crossfit/bootcamp', 'description' => '(later toevoegen)', 'banner_image' => '/assets/img/photos/photo5.jpg', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 8,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Kickboksen', 'description' => '(later toevoegen)', 'banner_image' => '/assets/img/photos/photo6.jpg', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 9,     'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Spinning', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 10,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Hardlopen', 'description' => 'Beginners en gevorderden.', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 11,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Beachvolleybal', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 12,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Stadswandeling', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 13,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Casting', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 14,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Unihockey', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 15,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Roeien', 'description' => '(zorg dat je op de fiets komt of bij iemand achterop kunt; je moet kunnen zwemmen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 16,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Bamboebouwen', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 17,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Voetbal', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 18,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'In Control', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 19,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Zumba/Core training/Aerobics', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 20,    'event_id' => 1,   'executed_by' => 'Dirk-Jan Bartels', 'name' => 'Bootcamp', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 21,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Yoga', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 22,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Dans workshop', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 23,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Trampoline', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 24,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Balancebikes', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 25,    'event_id' => 1,   'executed_by' => 'Monica', 'name' => 'Bootcamp', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 26,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Jeet Kune Do (vechtsport)', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 27,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Weerbaarheid', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 28,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Pannakooi', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 29,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Drama workshop', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 30,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'DJ Workshop', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 31,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Muziek workshop', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 32,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Design workshop', 'description' => '(later toevoegen)', 'banner_image' => '/img/design.jpg', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 33,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Curves', 'description' => '(alleen voor vrouwen)', 'banner_image' => '/img/curves.jpg', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 34,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'Tai Chi', 'description' => '(later toevoegen)', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activities')->insert(['id' => 35,    'event_id' => 1,   'executed_by' => 'trainer', 'name' => 'WeHelpen', 'description' => 'een originele hulpactie verzinnen (iemand helpen), uitvoeren, en daar een vlog van maken.', 'banner_image' => 'https://dummyimage.com/1024x200/000/fff', 'thumbnail_image' => 'https://dummyimage.com/100x100/000/fff', 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('enlistments')->insert(['id' => 1, 'event_id'=>1, 'activity_id' => 5, 'round_id' => 1, 'user_id' => 7, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['id' => 2, 'event_id'=>1, 'activity_id' => 13, 'round_id' => 1, 'user_id' => 7, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 7, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 8, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 9, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 10, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 11, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 12, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 13, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 14, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 15, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 16, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('enlistments')->insert(['event_id'=>1, 'activity_id' => 4, 'round_id' => 1, 'user_id' => 17, 'created_at' => $nu, 'updated_at' => $nu,]);


        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // disable foreign key constraints
    }
}
