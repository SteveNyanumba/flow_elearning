<?php

namespace Database\Seeders;

use App\Models\ChatMessage;
use Illuminate\Database\Seeder;

class messagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminMessage = new ChatMessage();
        $adminMessage->lesson_id = 3;
        $adminMessage->user_id = 3;
        $adminMessage->message = 'This is a test for channel 5. I hope it works';
        $adminMessage->save();


        $userMessage = new ChatMessage();
        $userMessage->lesson_id = 3;
        $userMessage->user_id = 4;
        $userMessage->message = 'From the user side of things I hope this works too';
        $userMessage->save();


    }
}
