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
                'activity_id' => 4,
                'eventround_id' => 4,
                'max_participants' => 15
            ],
            [
                'activity_id' => 4,
                'eventround_id' => 5,
                'max_participants' => 15
            ],
            [
                'activity_id' => 4,
                'eventround_id' => 6,
                'max_participants' => 15
            ],
            [
                'activity_id' => 3,
                'eventround_id' => 4,
                'max_participants' => 8
            ],
            [
                'activity_id' => 3,
                'eventround_id' => 5,
                'max_participants' => 8
            ],
            [
                'activity_id' => 3,
                'eventround_id' => 6,
                'max_participants' => 8
            ],
            [
                'activity_id' => 2,
                'eventround_id' => 4,
                'max_participants' => 10
            ],
            [
                'activity_id' => 2,
                'eventround_id' => 5,
                'max_participants' => 10
            ],
            [
                'activity_id' => 2,
                'eventround_id' => 6,
                'max_participants' => 10
            ],
            [
                'activity_id' => 5,
                'eventround_id' => 10,
                'max_participants' => 1
            ],
            [
                'activity_id' => 5,
                'eventround_id' => 11,
                'max_participants' => 2
            ],
            [
                'activity_id' => 5,
                'eventround_id' => 12,
                'max_participants' => 5
            ],
            [
                'activity_id' => 5,
                'eventround_id' => 13,
                'max_participants' => 20
            ],
        ];

        foreach ($data as $key => $value) {
            ActivityRound::create($value);
        }
    }
}
