<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['name', 'email', 'photo', 'major_id'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
