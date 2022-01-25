<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * For the Super Administrator
         */
        $super = new User();
        $super->name = 'Superior Administrator';
        $super->email = 'admin@flow.edu';
        $super->role_id = 1;
        $super->password = Hash::make('1234567890');
        $super->save();


        /**
         * For the Common Administrator
         */
        $admin = new User();
        $admin->name = 'Taylor Otwell';
        $admin->email = 'totwell@flow.edu';
        $admin->role_id = 2;
        $admin->password = Hash::make('1234567890');
        $admin->save();


        /**
         * For the Lecturer
         */
        $lecturer = new User();
        $lecturer->name = 'Big John';
        $lecturer->email = 'bjohn@flow.edu';
        $lecturer->role_id = 3;
        $lecturer->password = Hash::make('1234567890');
        $lecturer->save();

        /**
         * For the Student
         */
        $student = new User();
        $student->name = 'Steve Nyanumba';
        $student->email = 'steve.nyanumba@flow.edu';
        $student->role_id = 4;
        $student->password = Hash::make('1234567890');
        $student->save();

    }
}
