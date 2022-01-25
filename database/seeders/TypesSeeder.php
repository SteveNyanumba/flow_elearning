<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'id' => 1,
                'title' => 'Certificate Course',
            ],
            [
                'id' => 2,
                'title' => 'Diploma',
            ],
            [
                'id' => 3,
                'title' => "Bachelor's Degree",
            ],
            [
                'id' => 4,
                'title' => "Master's Degree",
            ],
            [
                'id' => 5,
                'title' => "Doctor of Philosophy",
            ],
        ];

        Type::insert($types);
    }
}
