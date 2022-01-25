<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $appends = [
        'units',
        'students'
    ];



    /**
     * The roles that belong to the Course
     *
     */
    public function units()
    {
        return $this->belongsToMany(Unit::class, 'course_unit', 'course_id', 'unit_id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id');
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function getUnitsAttribute()
    {
        return $this->units()->get();
    }
    public function getStudentsAttribute()
    {
        return $this->students()->get();
    }
}
