<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseUnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Course::find(1)->units()->attach([2,3,4,6,8,9]);
        Course::find(2)->units()->attach([1,3,5,6,7]);
        Course::find(3)->units()->attach([1,3,4,5,8,9,10]);
        Course::find(4)->units()->attach([2,3,5,6,7,10]);
        Course::find(5)->units()->attach([1,2,3,4,5]);
        Course::find(6)->units()->attach([4,5,2,10,8]);
        Course::find(7)->units()->attach([10,9,1]);







    }
}
