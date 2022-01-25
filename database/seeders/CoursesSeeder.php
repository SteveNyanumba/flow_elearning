<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'title'=>"Bachelor Of Science In Electrical and Electronics Engineering",
                'abbreviation'=>"BSc. EEE",
                'type_id'=>3,
                'faculty_id'=>1
            ],
            [
                'title'=>"Master of Science in Sustainable Energy Transitions",
                'abbreviation'=>"MSc. SET",
                'type_id'=>4,
                'faculty_id'=>1
            ],
            [
                'title'=>"Master in Hospitality Business Management",
                'abbreviation'=>"MHBM",
                'type_id'=>4,
                'faculty_id'=>5
            ],
            [
                'title'=>"Teacher Enhancement Programme",
                'abbreviation'=>"TEP",
                'type_id'=>1,
                'faculty_id'=>7
            ],
            [
                'title'=>"Bachelor of Financial Services",
                'abbreviation'=>null,
                'type_id'=>3,
                'faculty_id'=>4
            ],
            [
                'title'=>"Master of Business Administration for Executives",
                'abbreviation'=>"MBA-E",
                'type_id'=>4,
                'faculty_id'=>4
            ],
            [
                'title'=>"Master of Business Administration for Healthcare Management",
                'abbreviation'=>"MBA-HCM",
                'type_id'=>4,
                'faculty_id'=>4
            ],
        ];

        Course::insert($courses);
    }
}
