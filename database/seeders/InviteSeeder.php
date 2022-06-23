<?php

namespace Database\Seeders;

use App\Models\Invite;
use Illuminate\Database\Seeder;

class InviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
              'activiteit' => 'Test activiteit',
              'beschrijving' => 'Dit is een activiteit',
              'ronde' => 4,
              'capaciteit' => 12,
            ]
        ];
       
        foreach ($data as $key => $value) {
            Invite::create($value);
        }
    }
}
