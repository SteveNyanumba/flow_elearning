<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = [
            [
                'id'         => 1,
                'lecturer_id' => 3,
                'unit_id'   => 1,
                'semester_id'   => 2,
                'day_id'    => 1,
                'stream_key'=>random_int(998, 8484848484848484),
                'start_time' => '10:00',
                'end_time'   => '12:00',
            ],
            [
                'id'         => 2,
                'lecturer_id' => 6,
                'unit_id'   => 2,
                'semester_id'   => 2,
                'day_id'    => 1,
                'stream_key'=>random_int(998, 8484848484848484),
                'start_time' => '15:00',
                'end_time'   => '17:00',
            ],
            [
                'id'         => 3,
                'lecturer_id' => 5,
                'unit_id'   => 3,
                'semester_id'   => 2,
                'stream_key'=>random_int(998, 8484848484848484),
                'day_id'    => 2,
                'start_time' => '14:00',
                'end_time'   => '16:00',
            ],
            [
                'id'         => 4,
                'lecturer_id' => 7,
                'unit_id'   => 3,
                'semester_id'   => 2,
                'stream_key'=>random_int(998, 8484848484848484),
                'day_id'    => 2,
                'start_time' => '14:00',
                'end_time'   => '16:00',
            ],
        ];

        Lesson::insert($lessons);
    }
}
