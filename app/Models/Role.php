<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $appends = [
        'users'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function getUsersAttribute()
    {
        return $this->users()->get();
    }
}
