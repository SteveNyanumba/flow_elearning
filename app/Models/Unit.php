<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $appends = [
        'lecturers'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_unit', 'unit_id', 'course_id');
    }

    public function category()
    {
        return $this->hasOne(UnitCategory::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'unit_id', 'id');
    }


    public function getCategoryAttribute()
    {
        return $this->category()->first()->title;
    }


    public function lecturers()
    {
        return $this->belongsToMany(User::class, 'lecturer_unit', 'unit_id', 'lecturer_id');
    }

    public function getLecturersAttribute()
    {
        return $this->lecturers()->get();
    }
}
