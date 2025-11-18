<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\ClassGroup;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['room','classGroup','teacher','subject'])
            ->orderBy('day')
            ->orderBy('lesson_number')
            ->get();

        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedules.create', [
            'rooms' => Room::all(),
            'classGroups' => ClassGroup::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
            'days' => $this->days(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'lesson_number' => 'required|integer',
            'start_time' => 'required',
            'end_time' => 'required',
            'room_id' => 'required',
            'class_group_id' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required',
        ]);

        Schedule::create($request->all());

        return redirect()->route('admin.schedules.index')
                         ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Schedule $schedule)
    {
        return view('admin.schedules.edit', [
            'schedule' => $schedule,
            'rooms' => Room::all(),
            'classGroups' => ClassGroup::all(),
            'teachers' => Teacher::all(),
            'subjects' => Subject::all(),
            'days' => $this->days(),
        ]);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'day' => 'required',
            'lesson_number' => 'required|integer',
            'start_time' => 'required',
            'end_time' => 'required',
            'room_id' => 'required',
            'class_group_id' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required',
        ]);

        $schedule->update($request->all());

        return redirect()->route('admin.schedules.index')
                         ->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return back()->with('success', 'Jadwal berhasil dihapus.');
    }

    private function days()
    {
        return [
            'senin' => 'Senin',
            'selasa' => 'Selasa',
            'rabu' => 'Rabu',
            'kamis' => 'Kamis',
            'jumat' => 'Jumat',
            'sabtu' => 'Sabtu',
        ];
    }
}
