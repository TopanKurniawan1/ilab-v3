<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = ['name', 'code', 'color'];

    public function classGroups()
    {
        return $this->hasMany(ClassGroup::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
