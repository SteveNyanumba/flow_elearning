<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $hidden = [];


    /**
     * Append Required states of the  lesson
     */

    protected $appends = [
        'lecturer',
        'day',
        'unit',
        'min_difference',
        'messages',
        'stream_url',
        'students'
    ];

    // protected $hidden = [
    //     'unit_id',
    //     'lecturer_id',
    //     'semester_id',
    // ];





    /**
     * Relationships
     */

    public function lecturer()
    {
        return $this->belongsTo(User::class, 'lecturer_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function getDayAttribute()
    {
        return Day::find($this->day_id)->day;
    }


    /**
     * Satisfy the Appended Attributes
     */

    public function getLecturerAttribute()
    {
        return $this->lecturer()->first();
    }

    public function getUnitAttribute()
    {
        return $this->unit()->first();
    }


    public function getStreamUrlAttribute()
    {
        return "ws://localhost:5000". "/live/" . $this->stream_key.'.flv';
    }
    public function getMinDifferenceAttribute()
    {
        return Carbon::parse($this->end_time)->diffInMinutes($this->start_time);
    }




    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }


    public function getMessagesAttribute()
    {
        return $this->messages()->get();
    }


    /**
     * The roles that belong to the Lesson
     *
     */
    public function students()
    {
        return $this->belongsToMany(User::class, 'lesson_student', 'student_id', 'lesson_id');
    }



    public function getStudentsAttribute()
    {
        return $this->students()->get();
    }
}
