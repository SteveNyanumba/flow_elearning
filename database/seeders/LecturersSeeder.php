<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LecturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lecturer = new User();
        $lecturer->name = 'Elden Tomaszewski';
        $lecturer->email = Str::slug($lecturer->name).'@flow.edu';
        while (User::where('email', $lecturer->email)->exists()) {
            $lecturer->email = Str::slug($lecturer->name).random_int(1,99).'@flow.edu';
        }
        $lecturer->password = Hash::make('1234567890');
        $lecturer->role_id = 3;
        $lecturer->save();


        $lecturer2 = new User();
        $lecturer2->name = 'Ursulina Ramard';
        $lecturer2->email = Str::slug($lecturer2->name).'@flow.edu';
        while (User::where('email', $lecturer2->email)->exists()) {
            $lecturer2->email = Str::slug($lecturer2->name).random_int(1,99).'@flow.edu';
        }
        $lecturer2->password = Hash::make('1234567890');
        $lecturer2->role_id = 3;
        $lecturer2->save();


        $lecturer3 = new User();
        $lecturer3->name = 'Delphinia Aguirrezabala';
        $lecturer3->email = Str::slug($lecturer3->name).'@flow.edu';
        while (User::where('email', $lecturer3->email)->exists()) {
            $lecturer3->email = Str::slug($lecturer3->name).random_int(1,99).'@flow.edu';
        }
        $lecturer3->password = Hash::make('1234567890');
        $lecturer3->role_id = 3;
        $lecturer3->save();


        $lecturer4 = new User();
        $lecturer4->name = 'Eduard Dowling';
        $lecturer4->email = Str::slug($lecturer4->name).'@flow.edu';
        while (User::where('email', $lecturer4->email)->exists()) {
            $lecturer4->email = Str::slug($lecturer4->name).random_int(1,99).'@flow.edu';
        }
        $lecturer4->password = Hash::make('1234567890');
        $lecturer4->role_id = 3;
        $lecturer4->save();


        $lecturer5 = new User();
        $lecturer5->name = 'Hilliard Moorton';
        $lecturer5->email = Str::slug($lecturer5->name).'@flow.edu';
        while (User::where('email', $lecturer5->email)->exists()) {
            $lecturer5->email = Str::slug($lecturer5->name).random_int(1,99).'@flow.edu';
        }
        $lecturer5->password = Hash::make('1234567890');
        $lecturer5->role_id = 3;
        $lecturer5->save();



    }
}
