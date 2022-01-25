<?php

namespace Database\Seeders;

use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SemestersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $semesters = [
            [
                'id'=>1,
                'title'=>'January - April 2021',
                'sem_start'=>Carbon::parse('01/01/2021')->toDate(),
                'sem_end'=>Carbon::parse('12/04/2021')->toDate(),
            ],
            [
                'id'=>2,
                'title'=>'May - August 2021',
                'sem_start'=>Carbon::parse('01/05/2021')->toDate(),
                'sem_end'=>Carbon::parse('12/08/2021')->toDate(),
            ],
            [
                'id'=>3,
                'title'=>'September - December 2021',
                'sem_start'=>Carbon::parse('01/09/2021')->toDate(),
                'sem_end'=>Carbon::parse('12/12/2021')->toDate(),
            ],
        ];

        Semester::insert($semesters);
    }
}
