<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Major;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('major')->get();

        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        $majors = Major::all();
        return view('admin.subjects.create', compact('majors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'code'     => 'nullable',
            'major_id' => 'required|exists:majors,id'
        ]);

        Subject::create($request->all());

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Mapel berhasil ditambahkan.');
    }

    public function edit(Subject $subject)
    {
        $majors = Major::all();
        return view('admin.subjects.edit', compact('subject', 'majors'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name'     => 'required',
            'code'     => 'nullable',
            'major_id' => 'required|exists:majors,id'
        ]);

        $subject->update($request->all());

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Mapel berhasil diperbarui.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Mapel berhasil dihapus.');
    }
}
