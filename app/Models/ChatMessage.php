<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    public $appends = [
        'user'
    ];


    public function room()
    {
        return $this->hasOne(Lesson::class, 'id', 'lesson_id');
    }


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getUserAttribute()
    {
        return $this->user()->first();
    }
}
