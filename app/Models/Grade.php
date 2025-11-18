<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['name', 'level'];

    public function classGroups()
    {
        return $this->hasMany(ClassGroup::class);
    }
}
