<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roles_permissions_owner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->truncate();
        // DB::table('roles')->insert(['id' => 1, 'name' => 'admin', 'display_name' => 'Administrator', 'description' => 'Gebruikers in deze rol mogen alles.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('roles')->insert(['id' => 2, 'name' => 'events-admin', 'display_name' => 'Organisators', 'description' => 'Organisators mogen evenementen aanmaken en hun eigen evenementen (en alle bijbehorende activiteiten) bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('roles')->insert(['id' => 3, 'name' => 'activity-admin', 'display_name' => 'Activiteitleiders', 'description' => 'Activiteitleiders verzorgen een of meer activiteiten. Ze mogen deze activiteiten beheren en de inschrijvingen zien en bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('roles')->insert(['id' => 4, 'name' => 'group-admin', 'display_name' => 'Groepsleider', 'description' => 'Groepsleiders kunnen groepen maken, deelnemers in groepen indelen en van hun groepen zien wie waarvoor is ingeschreven.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('roles')->insert(['id' => 5, 'name' => 'participant', 'display_name' => 'Deelnemer', 'description' => 'Deelnemers kunnen zich inschrijven voor activiteiten.', 'created_at' => $nu, 'updated_at' => $nu,]);

        // DB::table('permissions')->truncate();
        // DB::table('permissions')->insert(['id' => 1, 'name' => 'create-user', 'display_name' => 'Create users', 'description' => 'Gebruiker mag nieuwe accounts maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 2, 'name' => 'edit-any-user', 'display_name' => 'Edit any user', 'description' => 'Gebruiker mag bestaande accounts bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 3, 'name' => 'delete-any-user', 'display_name' => 'Delete any user', 'description' => 'Gebruiker mag bestaande accounts verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 10, 'name' => 'create-event', 'display_name' => 'Evenementen maken', 'description' => 'je mag nieuwe evenementen maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 11, 'name' => 'edit-any-event', 'display_name' => 'Bewerken van elk evenement', 'description' => 'je mag eigen en andermans evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 12, 'name' => 'delete-any-event', 'display_name' => 'Verwijderen van elk evenement', 'description' => 'je mag eigen en andermans evenementen verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 13, 'name' => 'edit-my-events', 'display_name' => 'Bewerken van eigen evenementen', 'description' => 'je mag jouw evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 14, 'name' => 'delete-my-events', 'display_name' => 'Verwijderen van eigen evenementen', 'description' => 'je mag jouw evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 15, 'name' => 'list-my-events', 'display_name' => 'Bekijken van een lijst van eigen evenementen', 'description' => 'je mag jouw evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 16, 'name' => 'list-all-events', 'display_name' => 'Bekijken van een lijst van alle evenementen', 'description' => 'je mag jouw evenementen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 20, 'name' => 'create-activity', 'display_name' => 'Create activities', 'description' => 'je mag nieuwe activiteiten maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 21, 'name' => 'edit-any-activity', 'display_name' => 'Edit any activity', 'description' => 'je mag eigen en andermans activiteiten bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 22, 'name' => 'delete-any-activity', 'display_name' => 'Delete any activity', 'description' => 'je mag eigen en andermans activiteiten verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 23, 'name' => 'edit-my-activities', 'display_name' => 'Edit my activities', 'description' => 'je mag eigen activiteiten bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 24, 'name' => 'delete-my-activities', 'display_name' => 'Delete my activities', 'description' => 'je mag eigen activiteiten verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 25, 'name' => 'list-my-activities', 'display_name' => 'Bekijken van een lijst van eigen activiteiten', 'description' => 'je mag eigen activiteiten verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 26, 'name' => 'list-all-activities', 'display_name' => 'Bekijken van een lijst van eigen activiteiten', 'description' => 'je mag eigen activiteiten verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 30, 'name' => 'create-group', 'display_name' => 'Create groups', 'description' => 'je mag nieuwe groepen maken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 31, 'name' => 'edit-any-group', 'display_name' => 'Edit any group', 'description' => 'je mag eigen en andermans groepen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 32, 'name' => 'delete-any-group', 'display_name' => 'Delete any group', 'description' => 'je mag eigen en andermans groepen verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 33, 'name' => 'edit-my-groups', 'display_name' => 'Edit my groups', 'description' => 'je mag eigen groepen bewerken.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 34, 'name' => 'delete-my-groups', 'display_name' => 'Delete my groups', 'description' => 'je mag eigen groepen verwijderen.', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permissions')->insert(['id' => 35, 'name' => 'assign-users-to-group', 'display_name' => 'Deelnemers toewijzen aan een groep', 'description' => 'je mag deelnemers toewijzen aan een groep.', 'created_at' => $nu, 'updated_at' => $nu,]);

        // DB::table('permission_role')->truncate();
        // DB::table('permission_role')->insert(['permission_id' => 1, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 2, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 3, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 10, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 11, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 12, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 20, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 21, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 13, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 15, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 20, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 21, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 22, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 23, 'role_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 23, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 30, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 33, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 34, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('permission_role')->insert(['permission_id' => 35, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);

        // DB::table('role_user')->truncate();
        // DB::table('role_user')->insert(['user_id' => 1, 'role_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 2, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 3, 'role_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 4, 'role_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 5, 'role_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 6, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 7, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 8, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 9, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 10, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 11, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 12, 'role_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 13, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 14, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('role_user')->insert(['user_id' => 15, 'role_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);

        // DB::table('activity_user_owner')->truncate();
        // DB::table('activity_user_owner')->insert(['activity_id' => 1, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('activity_user_owner')->insert(['activity_id' => 1, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('activity_user_owner')->insert(['activity_id' => 1, 'user_id' => 3, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('activity_user_owner')->insert(['activity_id' => 2, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('activity_user_owner')->insert(['activity_id' => 2, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('activity_user_owner')->insert(['activity_id' => 2, 'user_id' => 4, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('activity_user_owner')->insert(['activity_id' => 3, 'user_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);

        // DB::table('event_user_owner')->truncate();
        // DB::table('event_user_owner')->insert(['event_id' => 1, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('event_user_owner')->insert(['event_id' => 1, 'user_id' => 2, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('event_user_owner')->insert(['event_id' => 3, 'user_id' => 1, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('event_user_owner')->insert(['event_id' => 3, 'user_id' => 5, 'created_at' => $nu, 'updated_at' => $nu,]);

        // DB::table('eventgroups')->truncate();
        // DB::table('eventgroups')->insert(['id' => 1, 'event_id' => 1, 'owner_id' => 6, 'name' => 'MBico17A0', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventgroups')->insert(['id' => 2, 'event_id' => 1, 'owner_id' => 6, 'name' => 'MBico17B0', 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventgroups')->insert(['id' => 3, 'event_id' => 1, 'owner_id' => 12, 'name' => 'MBico17R0', 'created_at' => $nu, 'updated_at' => $nu,]);

        // DB::table('eventrounds')->truncate();
        // DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 1, 'start_time' => $tienuur, 'end_time' => $elfuur, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 2, 'start_time' => $elfuur, 'end_time' => $twaalfuur, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventrounds')->insert(['event_id' => 1, 'round' => 3, 'start_time' => $eenuur, 'end_time' => $tweeuur, 'created_at' => $nu, 'updated_at' => $nu,]);

        // DB::table('eventgroup_user')->truncate();
        // DB::table('eventgroup_user')->insert(['eventgroup_id' => 1, 'user_id' => 7, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventgroup_user')->insert(['eventgroup_id' => 1, 'user_id' => 8, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventgroup_user')->insert(['eventgroup_id' => 1, 'user_id' => 9, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventgroup_user')->insert(['eventgroup_id' => 2, 'user_id' => 10, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventgroup_user')->insert(['eventgroup_id' => 2, 'user_id' => 11, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventgroup_user')->insert(['eventgroup_id' => 3, 'user_id' => 13, 'created_at' => $nu, 'updated_at' => $nu,]);
        // DB::table('eventgroup_user')->insert(['eventgroup_id' => 3, 'user_id' => 14, 'created_at' => $nu, 'updated_at' => $nu,]);
    }
}
