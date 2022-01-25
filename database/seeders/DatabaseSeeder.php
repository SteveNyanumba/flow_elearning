<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            UsersSeeder::class,
            FacultiesSeeder::class,
            SemestersSeeder::class,
            UnitCategoriesSeeder::class,
            TypesSeeder::class,
            CoursesSeeder::class,
            DaysSeeder::class,
            UnitsSeeder::class,
            CourseUnitTableSeeder::class,
            LecturersSeeder::class,
            StudentsSeeder::class,
            LessonsSeeder::class,
            messagesSeeder::class,
            CourseStudentSeeder::class,

        ]);
    }
}
