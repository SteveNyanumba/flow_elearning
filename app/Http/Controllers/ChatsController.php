<?php

namespace App\Http\Controllers;

use App\Events\NewChatMessage;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    public function rooms()
    {
        // return ChatRoom::all();
    }

    public function messages(Request $request, $lessonId)
    {
        return ChatMessage::where('lesson_id', $lessonId)
            ->orderBy('created_at', 'ASC')
            ->get();
    }

    public function newMessage(Request $request, $lessonId){
        $newMessage = new ChatMessage;
        $newMessage->user_id = auth()->user()->id;
        $newMessage->lesson_id = $lessonId;
        $newMessage->message = $request->message;
        $newMessage->save();

        broadcast(new NewChatMessage($newMessage))->toOthers();

    }
}
