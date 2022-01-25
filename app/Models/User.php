<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'role',
        'is_admin',
        'is_lecturer',
        'is_super',// getIsSuperAttribute
        'is_student',
        'sessions',
    ];


    // public function courses()
    // {
    //     return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    // }


    // public function getCoursesAttribute()
    // {
    //     if ($this->courses() != null) return $this->courses()->get();
    // }


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }



    /*
    * This section of code sorts out the attribution of Roles
    */
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_id');
    }

    public function getIsSuperAttribute()
    {
        return $this->role_id == 1;
        // isSuper
    }
    public function getIsAdminAttribute()
    {
        return $this->role_id == 1 || $this->role_id == 2;
        // isAdmin
    }
    public function getIsLecturerAttribute()
    {
        return $this->role_id == 3;
        //isLecturer
    }
    public function getIsStudentAttribute()
    {
        return $this->role_id == 4;
        // isStudent
    }

    public function getLecturerUnitAttribute()
    {
        return $this->belongsToMany(Unit::class, 'lecturer_unit', 'unit_id', 'lecturer_id');
    }

    public function getRoleAttribute()
    {
        return $this->role()->first()->title;
    }

    /**
     * Get all of the sessions for the User
     *
     */
    public function sessions()
    {
        return $this->hasMany(Session::class, 'user_id', 'id');
    }

    public function getSessionsAttribute()
    {
        return $this->sessions()->get();
    }
}
