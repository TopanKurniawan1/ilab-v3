<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::orderBy('name')->get();

        return view('admin.majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'code'  => 'nullable|string|max:10',
            'color' => 'nullable|string|max:20',
        ]);

        Major::create($validated);

        return redirect()
            ->route('admin.majors.index')
            ->with('success', 'Jurusan berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(Major $major)
    {
        return view('admin.majors.edit', compact('major'));
    }

    /**
     * Update the resource.
     */
    public function update(Request $request, Major $major)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'code'  => 'nullable|string|max:10',
            'color' => 'nullable|string|max:20',
        ]);

        $major->update($validated);

        return redirect()
            ->route('admin.majors.index')
            ->with('success', 'Jurusan berhasil diperbarui.');
    }

    /**
     * Remove the resource.
     */
    public function destroy(Major $major)
    {
        $major->delete();

        return redirect()
            ->route('admin.majors.index')
            ->with('success', 'Jurusan berhasil dihapus.');
    }
}
