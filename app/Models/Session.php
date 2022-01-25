<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions';

    protected $appends = [
        // 'browser',
        'last_activity_dt',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }


    // public function getBrowserAttribute()
    // {
    //     return get_browser($this->user_agent, false);
    // }

    public function getLastActivityDtAttribute()
    {
        return Carbon::createFromTimestamp($this->last_activity, 'Africa/Nairobi')->toDateTimeString();
    }
}
