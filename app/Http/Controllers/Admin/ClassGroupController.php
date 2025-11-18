<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassGroup;
use App\Models\Grade;
use App\Models\Major;
use Illuminate\Http\Request;

class ClassGroupController extends Controller
{
    public function index()
    {
        $classGroups = ClassGroup::with(['grade', 'major'])->orderBy('grade_id')->get();
        return view('admin.class-groups.index', compact('classGroups'));
    }

    public function create()
    {
        $grades = Grade::orderBy('level')->get();
        $majors = Major::orderBy('name')->get();

        return view('admin.class-groups.create', compact('grades', 'majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'grade_id' => 'required|exists:grades,id',
            'major_id' => 'required|exists:majors,id',
            'name' => 'required|string|max:100',
        ]);

        ClassGroup::create($request->all());

        return redirect()->route('admin.class-groups.index')
            ->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function edit(ClassGroup $classGroup)
    {
        $grades = Grade::orderBy('level')->get();
        $majors = Major::orderBy('name')->get();

        return view('admin.class-groups.edit', compact('classGroup', 'grades', 'majors'));
    }

    public function update(Request $request, ClassGroup $classGroup)
    {
        $request->validate([
            'grade_id' => 'required|exists:grades,id',
            'major_id' => 'required|exists:majors,id',
            'name' => 'required|string|max:100',
        ]);

        $classGroup->update($request->all());

        return redirect()->route('admin.class-groups.index')
            ->with('success', 'Kelas berhasil diperbarui!');
    }

    public function destroy(ClassGroup $classGroup)
    {
        $classGroup->delete();

        return redirect()->route('admin.class-groups.index')
            ->with('success', 'Kelas berhasil dihapus!');
    }
}
