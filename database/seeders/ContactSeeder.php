<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_user_id = null;
        $admin_user = User::where("email", "admin@gmail.com")->where("first_name", "admin")->first();
        if ($admin_user !== null) {
            $admin_user_id = $admin_user->id;
        }

        Contact::create(['roepnaam' => 'Test', 'tussenvoegsel' => '', 'achternaam' => 'Contact', 'email' => '99061684@mydavinci.nl', 'op_mailinglijst' => true, 'created_by' => $admin_user_id]);
    }
}
