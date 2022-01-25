<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Unit;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [
                'id'=>1,
                'title'=>'Introduction to Programming',
                'category_id'=>4,
            ],
            [
                'id'=>2,
                'title'=>'Accounting for Liabilities',
                'category_id'=>4,
            ],
            [
                'id'=>3,
                'title'=>'Philosophical Anthropology',
                'category_id'=>3,
            ],
            [
                'id'=>4,
                'title'=>'Communication Skills I',
                'category_id'=>2,
            ],
            [
                'id'=>5,
                'title'=>'Differential Calculus',
                'category_id'=>4,
            ],
            [
                'id'=>6,
                'title'=>'Application Programming for the Internet',
                'category_id'=>4,
            ],
            [
                'id'=>7,
                'title'=>'French I',
                'category_id'=>1,
            ],
            [
                'id'=>8,
                'title'=>'Innovation and Entrepreneurship',
                'category_id'=>5,
            ],
            [
                'id'=>9,
                'title'=>'Multimedia Applications',
                'category_id'=>4,
            ],
            [
                'id'=>10,
                'title'=>'French II',
                'category_id'=>1,
            ],
        ];

        Unit::insert($units);


    }
}
