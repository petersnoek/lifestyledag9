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

        DB::table('roles')->truncate();
        DB::table('roles')->insert(['id' => 1, 'name' => 'admin', 'display_name' => 'Administrator', 'description' => 'Gebruikers in deze rol mogen alles.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('roles')->insert(['id' => 2, 'name' => 'events-admin', 'display_name' => 'Organisators', 'description' => 'Organisators mogen evenementen aanmaken en hun eigen evenementen (en alle bijbehorende activiteiten) bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('roles')->insert(['id' => 3, 'name' => 'activity-admin', 'display_name' => 'Activiteitleiders', 'description' => 'Activiteitleiders verzorgen een of meer activiteiten. Ze mogen deze activiteiten beheren en de inschrijvingen zien en bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('roles')->insert(['id' => 4, 'name' => 'group-admin', 'display_name' => 'Groepsleider', 'description' => 'Groepsleiders kunnen groepen maken, deelnemers in groepen indelen en van hun groepen zien wie waarvoor is ingeschreven.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('roles')->insert(['id' => 5, 'name' => 'participant', 'display_name' => 'Deelnemer', 'description' => 'Deelnemers kunnen zich inschrijven voor activiteiten.', 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('permissions')->truncate();
        DB::table('permissions')->insert(['id' => 1, 'name' => 'create-user', 'display_name' => 'Create users', 'description' => 'Gebruiker mag nieuwe accounts maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 2, 'name' => 'edit-any-user', 'display_name' => 'Edit any user', 'description' => 'Gebruiker mag bestaande accounts bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 3, 'name' => 'delete-any-user', 'display_name' => 'Delete any user', 'description' => 'Gebruiker mag bestaande accounts verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 10, 'name' => 'create-event', 'display_name' => 'Evenementen maken', 'description' => 'je mag nieuwe evenementen maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 11, 'name' => 'edit-any-event', 'display_name' => 'Bewerken van elk evenement', 'description' => 'je mag eigen en andermans evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 12, 'name' => 'delete-any-event', 'display_name' => 'Verwijderen van elk evenement', 'description' => 'je mag eigen en andermans evenementen verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 13, 'name' => 'edit-my-events', 'display_name' => 'Bewerken van eigen evenementen', 'description' => 'je mag jouw evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 14, 'name' => 'delete-my-events', 'display_name' => 'Verwijderen van eigen evenementen', 'description' => 'je mag jouw evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 15, 'name' => 'list-my-events', 'display_name' => 'Bekijken van een lijst van eigen evenementen', 'description' => 'je mag jouw evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 16, 'name' => 'list-all-events', 'display_name' => 'Bekijken van een lijst van alle evenementen', 'description' => 'je mag jouw evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 20, 'name' => 'create-activity', 'display_name' => 'Create activities', 'description' => 'je mag nieuwe activiteiten maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 21, 'name' => 'edit-any-activity', 'display_name' => 'Edit any activity', 'description' => 'je mag eigen en andermans activiteiten bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 22, 'name' => 'delete-any-activity', 'display_name' => 'Delete any activity', 'description' => 'je mag eigen en andermans activiteiten verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 23, 'name' => 'edit-my-activities', 'display_name' => 'Edit my activities', 'description' => 'je mag eigen activiteiten bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 24, 'name' => 'delete-my-activities', 'display_name' => 'Delete my activities', 'description' => 'je mag eigen activiteiten verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 25, 'name' => 'list-my-activities', 'display_name' => 'Bekijken van een lijst van eigen activiteiten', 'description' => 'je mag eigen activiteiten verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 26, 'name' => 'list-all-activities', 'display_name' => 'Bekijken van een lijst van eigen activiteiten', 'description' => 'je mag eigen activiteiten verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 30, 'name' => 'create-group', 'display_name' => 'Create groups', 'description' => 'je mag nieuwe groepen maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 31, 'name' => 'edit-any-group', 'display_name' => 'Edit any group', 'description' => 'je mag eigen en andermans groepen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 32, 'name' => 'delete-any-group', 'display_name' => 'Delete any group', 'description' => 'je mag eigen en andermans groepen verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 33, 'name' => 'edit-my-groups', 'display_name' => 'Edit my groups', 'description' => 'je mag eigen groepen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 34, 'name' => 'delete-my-groups', 'display_name' => 'Delete my groups', 'description' => 'je mag eigen groepen verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permissions')->insert(['id' => 35, 'name' => 'assign-users-to-group', 'display_name' => 'Deelnemers toewijzen aan een groep', 'description' => 'je mag deelnemers toewijzen aan een groep.', 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('permission_role')->truncate();
        DB::table('permission_role')->insert(['permission_id' => 1, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 2, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 3, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 10, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 11, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 12, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 20, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 21, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 13, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 15, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 20, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 21, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 22, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 23, 'role_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 23, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 30, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 33, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 34, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('permission_role')->insert(['permission_id' => 35, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('role_user')->truncate();
        DB::table('role_user')->insert(['user_id' => 1, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 2, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 3, 'role_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 4, 'role_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 5, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 6, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 7, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 8, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 9, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 10, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 11, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 12, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 13, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 14, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('role_user')->insert(['user_id' => 15, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('activity_user_owner')->truncate();
        DB::table('activity_user_owner')->insert(['activity_id' => 1, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activity_user_owner')->insert(['activity_id' => 1, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activity_user_owner')->insert(['activity_id' => 1, 'user_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activity_user_owner')->insert(['activity_id' => 2, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activity_user_owner')->insert(['activity_id' => 2, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activity_user_owner')->insert(['activity_id' => 2, 'user_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('activity_user_owner')->insert(['activity_id' => 3, 'user_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('event_user_owner')->truncate();
        DB::table('event_user_owner')->insert(['event_id' => 1, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('event_user_owner')->insert(['event_id' => 1, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('event_user_owner')->insert(['event_id' => 3, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('event_user_owner')->insert(['event_id' => 3, 'user_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('eventgroups')->truncate();
        DB::table('eventgroups')->insert(['id' => 1, 'event_id' => 1, 'owner_id' => 6, 'name' => 'MBico17A0', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventgroups')->insert(['id' => 2, 'event_id' => 1, 'owner_id' => 6, 'name' => 'MBico17B0', 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventgroups')->insert(['id' => 3, 'event_id' => 1, 'owner_id' => 12, 'name' => 'MBico17R0', 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('eventrounds')->truncate();
        DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 1, 'start_time' => $tienuur, 'end_time' => $elfuur, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 2, 'start_time' => $elfuur, 'end_time' => $twaalfuur, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 3, 'start_time' => $eenuur, 'end_time' => $tweeuur, 'created_at' => $nu, 'updated_at' => $nu,]);

        DB::table('eventgroup_user')->truncate();
        DB::table('eventgroup_user')->insert(['eventgroup_id' => 1, 'user_id' => 7, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventgroup_user')->insert(['eventgroup_id' => 1, 'user_id' => 8, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventgroup_user')->insert(['eventgroup_id' => 1, 'user_id' => 9, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventgroup_user')->insert(['eventgroup_id' => 2, 'user_id' => 10, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventgroup_user')->insert(['eventgroup_id' => 2, 'user_id' => 11, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventgroup_user')->insert(['eventgroup_id' => 3, 'user_id' => 13, 'created_at' => $nu, 'updated_at' => $nu,]);
        DB::table('eventgroup_user')->insert(['eventgroup_id' => 3, 'user_id' => 14, 'created_at' => $nu, 'updated_at' => $nu,]);

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
