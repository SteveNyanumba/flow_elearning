<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculties = [
            [
                'id'=>1,
                'title'=>'Computing and Engineering Sciences'
            ],
            [
                'id'=>2,
                'title'=>'Mathematical Sciences'
            ],
            [
                'id'=>3,
                'title'=>'Management and Technology (SI)'
            ],
            [
                'id'=>4,
                'title'=>'Business School'
            ],
            [
                'id'=>5,
                'title'=>'Hospitality and Tourism'
            ],
            [
                'id'=>6,
                'title'=>'Law School'
            ],
            [
                'id'=>7,
                'title'=>'Humanities and Social Sciences'
            ],
        ];

        Faculty::insert($faculties);
    }
}
