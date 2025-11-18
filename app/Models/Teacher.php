<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Teacher extends Model
{
    protected $fillable = [
        'major_id',
        'name',
        'email',
        'gender',
        'phone',
        'photo',
    ];

    public function major(): BelongsTo
    {
        return $this->belongsTo(Major::class);
    }
}
