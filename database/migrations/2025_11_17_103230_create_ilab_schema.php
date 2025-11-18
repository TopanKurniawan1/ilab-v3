<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Table grades
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // X, XI, XII
            $table->integer('level')->unsigned(); // 10,11,12
            $table->timestamps();
        });

        // 2. Table majors
        Schema::create('majors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Rekayasa Perangkat Lunak
            $table->string('code')->nullable(); // RPL
            $table->string('color')->nullable(); // warna untuk highlight jadwal
            $table->timestamps();
        });

        // 3. Table rooms (lab)
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Lab Komputer 1
            $table->string('code')->nullable(); // LAB1
            $table->integer('capacity')->nullable();
            $table->timestamps();
        });

        // 4. Table class_groups
        Schema::create('class_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // XII RPL 2
            $table->foreignId('grade_id')->constrained()->cascadeOnDelete();
            $table->foreignId('major_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // 5. Table teachers
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('photo')->nullable(); // foto guru
            $table->foreignId('major_id')->constrained()->cascadeOnDelete(); // jurusan guru
            $table->timestamps();
        });

        // 6. Table subjects
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->enum('type', ['umum', 'kejuruan'])->default('umum');
            $table->foreignId('major_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
        });

        // 7. Table schedules
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('class_group_id')->constrained()->cascadeOnDelete();
            $table->foreignId('room_id')->constrained()->cascadeOnDelete();
            $table->foreignId('teacher_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained()->cascadeOnDelete();

            $table->string('day'); // Monday - Friday
            $table->integer('lesson_number'); // jam ke 1-10
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schedules');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('teachers');
        Schema::dropIfExists('class_groups');
        Schema::dropIfExists('rooms');
        Schema::dropIfExists('majors');
        Schema::dropIfExists('grades');
    }
};
