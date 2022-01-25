<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitCategory extends Model
{
    use HasFactory;

    public $appends = [
        'units'
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function getUnitsAttribute()
    {
        return $this->units()->get();
    }
}
