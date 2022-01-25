<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $appends = [
        'courses'
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getCoursesAttribute()
    {
        return $this->courses()->get();
    }
}
