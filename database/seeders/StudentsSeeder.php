<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $student = new User();
            $student->name = 'Shellie Cooper';
            $student->email = Str::slug($student->name).'@flow.edu';
            do {
                $student->email = Str::slug($student->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student->email)->exists());
            $student->password = Hash::make('1234567890');
            $student->role_id = 4;
            $student->save();

            $student2 = new User();
            $student2->name = 'Charity Dillon';
            $student2->email = Str::slug($student2->name).'@flow.edu';
            do {
                $student2->email = Str::slug($student2->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student2->email)->exists());
            $student2->password = Hash::make('1234567890');
            $student2->role_id = 4;
            $student2->save();

            $student3 = new User();
            $student3->name = 'Wynter Kennedy';
            $student3->email = Str::slug($student3->name).'@flow.edu';
            do {
                $student3->email = Str::slug($student3->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student3->email)->exists());
            $student3->password = Hash::make('1234567890');
            $student3->role_id = 4;
            $student3->save();

            $student4 = new User();
            $student4->name = 'Pandora Gilliam';
            $student4->email = Str::slug($student4->name).'@flow.edu';
            do {
                $student4->email = Str::slug($student4->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student4->email)->exists());
            $student4->password = Hash::make('1234567890');
            $student4->role_id = 4;
            $student4->save();

            $student5 = new User();
            $student5->name = 'Breanna Cross';
            $student5->email = Str::slug($student5->name).'@flow.edu';
            do {
                $student5->email = Str::slug($student5->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student5->email)->exists());
            $student5->password = Hash::make('1234567890');
            $student5->role_id = 4;
            $student5->save();

            $student6 = new User();
            $student6->name = 'Courtnay Hallifax';
            $student6->email = Str::slug($student6->name).'@flow.edu';
            do {
                $student6->email = Str::slug($student6->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student6->email)->exists());
            $student6->password = Hash::make('1234567890');
            $student6->role_id = 4;
            $student6->save();

            $student7 = new User();
            $student7->name = 'Keene Louthe';
            $student7->email = Str::slug($student7->name).'@flow.edu';
            do {
                $student7->email = Str::slug($student7->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student7->email)->exists());
            $student7->password = Hash::make('1234567890');
            $student7->role_id = 4;
            $student7->save();

            $student8 = new User();
            $student8->name = 'Isac Jepensen';
            $student8->email = Str::slug($student8->name).'@flow.edu';
            do {
                $student8->email = Str::slug($student8->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student8->email)->exists());
            $student8->password = Hash::make('1234567890');
            $student8->role_id = 4;
            $student8->save();

            $student9 = new User();
            $student9->name = 'Lynea Goldingay';
            $student9->email = Str::slug($student9->name).'@flow.edu';
            do {
                $student9->email = Str::slug($student9->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student9->email)->exists());
            $student9->password = Hash::make('1234567890');
            $student9->role_id = 4;
            $student9->save();

            $student10 = new User();
            $student10->name = 'Jackelyn Lonergan';
            $student10->email = Str::slug($student10->name).'@flow.edu';
            do {
                $student10->email = Str::slug($student10->name).random_int(1,99).'@flow.edu';
            } while (User::where('email', $student10->email)->exists());
            $student10->password = Hash::make('1234567890');
            $student10->role_id = 4;
            $student10->save();

    }
}
