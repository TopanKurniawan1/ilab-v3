<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'class_group_id',
        'room_id',
        'teacher_id',
        'subject_id',
        'day',
        'lesson_number',
        'start_time',
        'end_time',
    ];

    public function classGroup()
    {
        return $this->belongsTo(ClassGroup::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
