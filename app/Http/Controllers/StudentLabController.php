<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Schedule;
use Illuminate\Http\Request;

class StudentLabController extends Controller
{
    /**
     * Halaman daftar semua lab (cards)
     */
    public function index()
    {
        $rooms = Room::orderBy('name')->get();

        return view('student.labs.index', compact('rooms'));
    }

    /**
     * Detail jadwal per hari
     */
    public function show(Room $room)
    {
        $days = [
            'senin' => 'Senin',
            'selasa' => 'Selasa',
            'rabu' => 'Rabu',
            'kamis' => 'Kamis',
            'jumat' => 'Jumat',
        ];

        // default hari: hari ini
        $currentDay = strtolower(now()->locale('id')->dayName);

        if (!array_key_exists($currentDay, $days)) {
            $currentDay = 'senin';
        }

        return view('student.labs.show', [
            'room' => $room,
            'days' => $days,
            'activeDay' => $currentDay,
        ]);
    }

    /**
     * API kecil untuk fetch jadwal per hari
     */
    public function getSchedule(Room $room, $day)
    {
        $schedule = Schedule::with(['teacher', 'subject', 'classGroup'])
            ->where('room_id', $room->id)
            ->where('day', $day)
            ->orderBy('lesson_number')
            ->get();

        return response()->json($schedule);
    }

    /**
     * Tampilan fullscreen TV
     */
    public function display(Room $room)
    {
        return view('student.labs.display', compact('room'));
    }
}
