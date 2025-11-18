<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Tampilkan daftar jurusan.
     */
    public function index()
    {
        $majors = Major::all();
        return view('majors.index', compact('majors'));
    }

    /**
     * Form tambah jurusan (opsional — jika tidak menggunakan modal).
     */
    public function create()
    {
        return view('majors.create');
    }

    /**
     * Simpan jurusan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:20'],
        ]);

        Major::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('majors.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    /**
     * Form edit jurusan.
     */
    public function edit(Major $major)
    {
        return view('majors.edit', compact('major'));
    }

    /**
     * Update jurusan.
     */
    public function update(Request $request, Major $major)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => ['nullable', 'string', 'max:20'],
        ]);

        $major->update([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('majors.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    /**
     * Hapus jurusan.
     */
    public function destroy(Major $major)
    {
        $major->delete();

        return redirect()->route('majors.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
