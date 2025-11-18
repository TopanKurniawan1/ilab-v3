<?php

use Illuminate\Support\Facades\Route;

// Profile (Breeze)
use App\Http\Controllers\ProfileController;

// Student
use App\Http\Controllers\StudentLabController;

// Admin Controllers
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\ClassGroupController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ScheduleController;

//public landing page
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//dashboard admin only

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified', 'role:admin'])
    ->name('dashboard');

//all page siswa

Route::middleware(['auth', 'verified', 'role:student'])
    ->prefix('student')
    ->name('student.')
    ->group(function () {

        Route::get('/labs', [StudentLabController::class, 'index'])
            ->name('labs.index');

        Route::get('/labs/{room}', [StudentLabController::class, 'show'])
            ->name('labs.show');

        Route::get('/labs/{room}/display', [StudentLabController::class, 'display'])
            ->name('labs.display');
    });

//crud admin
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource('majors', MajorController::class);
        Route::resource('grades', GradeController::class);
        Route::resource('class-groups', ClassGroupController::class);
        Route::resource('rooms', RoomController::class);
        Route::resource('teachers', TeacherController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('schedules', ScheduleController::class);
    });

//profil

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__ . '/auth.php';
