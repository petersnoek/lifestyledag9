<?php

namespace Database\Seeders;

use App\Models\ActivityRound;
use Illuminate\Database\Seeder;

class ActivityRoundsSeeder extends Seeder
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
                'activity_id' => 3,
                'event_round_id' => 10,
                'max_participants' => 15
            ],
            [
                'activity_id' => 3,
                'event_round_id' => 11,
                'max_participants' => 10
            ],
            [
                'activity_id' => 3,
                'event_round_id' => 12,
                'max_participants' => 8
            ],
            [
                'activity_id' => 3,
                'event_round_id' => 13,
                'max_participants' => 8
            ],
            [
                'activity_id' => 2,
                'event_round_id' => 10,
                'max_participants' => 15
            ],
            [
                'activity_id' => 2,
                'event_round_id' => 11,
                'max_participants' => 10
            ],
            [
                'activity_id' => 2,
                'event_round_id' => 12,
                'max_participants' => 8
            ],
            [
                'activity_id' => 2,
                'event_round_id' => 13,
                'max_participants' => 8
            ],
            [
                'activity_id' => 4,
                'event_round_id' => 10,
                'max_participants' => 15
            ],
            [
                'activity_id' => 4,
                'event_round_id' => 11,
                'max_participants' => 10
            ],
            [
                'activity_id' => 4,
                'event_round_id' => 12,
                'max_participants' => 8
            ],
            [
                'activity_id' => 4,
                'event_round_id' => 13,
                'max_participants' => 8
            ],
        ];

        foreach ($data as $key => $value) {
            ActivityRound::create($value);
        }
    }
}