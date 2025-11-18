<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('major')->orderBy('name')->get();

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $majors = Major::orderBy('name')->get();

        return view('admin.teachers.create', compact('majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'major_id' => 'required|exists:majors,id',
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email|max:255',
            'gender'   => 'nullable|in:L,P',
            'phone'    => 'nullable|string|max:50',
            'photo'    => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['major_id', 'name', 'email', 'gender', 'phone']);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('teachers', 'public');
            $data['photo'] = $path;
        }

        Teacher::create($data);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Guru berhasil ditambahkan!');
    }

    public function edit(Teacher $teacher)
    {
        $majors = Major::orderBy('name')->get();

        return view('admin.teachers.edit', compact('teacher', 'majors'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'major_id' => 'required|exists:majors,id',
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email|max:255',
            'gender'   => 'nullable|in:L,P',
            'phone'    => 'nullable|string|max:50',
            'photo'    => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['major_id', 'name', 'email', 'gender', 'phone']);

        if ($request->hasFile('photo')) {
            // hapus foto lama jika ada
            if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
                Storage::disk('public')->delete($teacher->photo);
            }

            $path = $request->file('photo')->store('teachers', 'public');
            $data['photo'] = $path;
        }

        $teacher->update($data);

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Guru berhasil diperbarui!');
    }

    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo && Storage::disk('public')->exists($teacher->photo)) {
            Storage::disk('public')->delete($teacher->photo);
        }

        $teacher->delete();

        return redirect()
            ->route('admin.teachers.index')
            ->with('success', 'Guru berhasil dihapus!');
    }
}
