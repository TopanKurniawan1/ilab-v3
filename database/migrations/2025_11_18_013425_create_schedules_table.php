<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up(): void
{
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();

        $table->foreignId('class_group_id')->constrained()->cascadeOnDelete();
        $table->foreignId('room_id')->constrained()->cascadeOnDelete();
        $table->foreignId('teacher_id')->constrained()->cascadeOnDelete();
        $table->foreignId('subject_id')->constrained()->cascadeOnDelete();

        $table->string('day');              // monday, tuesday, ...
        $table->integer('lesson_number');   // 1–10
        $table->time('start_time');
        $table->time('end_time');

        $table->timestamps();

        // Prevent double booking: room cannot be used twice at same time
        $table->unique(['room_id', 'day', 'lesson_number']);
        $table->unique(['teacher_id', 'day', 'lesson_number']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
