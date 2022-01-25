<?php

namespace Database\Seeders;

use App\Models\UnitCategory;
use Illuminate\Database\Seeder;

class UnitCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id'=>1,
                'title'=>'Language'
            ],
            [
                'id'=>2,
                'title'=>'Humanity'
            ],
            [
                'id'=>3,
                'title'=>'Theory'
            ],
            [
                'id'=>4,
                'title'=>'Practical'
            ],
            [
                'id'=>5,
                'title'=>'Presentational'
            ],
        ];

        UnitCategory::insert($categories);
    }
}
