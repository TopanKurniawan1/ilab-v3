<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::orderBy('level')->get();

        return view('admin.grades.index', compact('grades'));
    }

    public function create()
    {
        return view('admin.grades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:10',
            'level' => 'required|integer|min:1|max:12',
        ]);

        Grade::create($request->only(['name', 'level']));

        return redirect()->route('admin.grades.index')
            ->with('success', 'Tingkatan berhasil ditambahkan.');
    }

    public function edit(Grade $grade)
    {
        return view('admin.grades.edit', compact('grade'));
    }

    public function update(Request $request, Grade $grade)
    {
        $request->validate([
            'name'  => 'required|string|max:10',
            'level' => 'required|integer|min:1|max:12',
        ]);

        $grade->update($request->only(['name', 'level']));

        return redirect()->route('admin.grades.index')
            ->with('success', 'Tingkatan berhasil diperbarui.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('admin.grades.index')
            ->with('success', 'Tingkatan berhasil dihapus.');
    }
}
