<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'code', 'type', 'major_id'];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
