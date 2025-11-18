<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentLabController;

// Admin Controllers
use App\Http\Controllers\MajorController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassGroupController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ScheduleController;

/*
|--------------------------------------------------------------------------
| Public Landing Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Dashboard (Hanya admin)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Student Routes (role: student)
|--------------------------------------------------------------------------
|
| Halaman yang dilihat siswa setelah login.
*/

Route::middleware(['auth', 'verified', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        // Daftar lab (card list)
        Route::get('/labs', [StudentLabController::class, 'index'])
            ->name('labs.index');

        // Detail jadwal per lab
        Route::get('/labs/{room}', [StudentLabController::class, 'show'])
            ->name('labs.show');

        // Tampilan full display untuk TV
        Route::get('/labs/{room}/display', [StudentLabController::class, 'display'])
            ->name('labs.display');
    });

/*
|--------------------------------------------------------------------------
| Admin Routes (role: admin)
|--------------------------------------------------------------------------
|
| Semua CRUD untuk admin ditaruh di sini.
*/

Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // CRUD Jurusan
        Route::resource('majors', MajorController::class);

        // CRUD Tingkatan (Grade)
        Route::resource('grades', GradeController::class);

        // CRUD Rombongan Belajar (ClassGroups)
        Route::resource('class-groups', ClassGroupController::class);

        // CRUD Ruangan/Lab
        Route::resource('rooms', RoomController::class);

        // CRUD Guru
        Route::resource('teachers', TeacherController::class);

        // CRUD Mapel
        Route::resource('subjects', SubjectController::class);

        // CRUD Jadwal
        Route::resource('schedules', ScheduleController::class);
    });

/*
|--------------------------------------------------------------------------
| Profile Breeze
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
