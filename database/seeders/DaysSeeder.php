<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days= [
            ['day' => 'Monday',],
            ['day' => 'Tuesday',],
            ['day' => 'Wednesday',],
            ['day' => 'Thursday',],
            ['day' => 'Friday',],
            ['day' => 'Saturday',],
            ['day' => 'Sunday',],
        ];


        Day::insert($days);

    }
}
