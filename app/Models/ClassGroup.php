<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassGroup extends Model
{
    protected $fillable = ['grade_id', 'major_id', 'name'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
