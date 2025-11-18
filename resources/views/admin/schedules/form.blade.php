<form action="{{ $action }}" method="POST" class="space-y-5">
    @csrf
    @if ($method === 'PUT') @method('PUT') @endif

    {{-- HARI --}}
    <div>
        <label class="text-gray-200">Hari</label>
        <select name="day" class="w-full rounded bg-gray-900 text-gray-100 border border-gray-700 px-3 py-2">
            @foreach ($days as $key => $label)
                <option value="{{ $key }}"
                    @selected(old('day', $schedule->day ?? '') == $key)>
                    {{ $label }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- JAM KE --}}
    <div>
        <label class="text-gray-200">Jam Pelajaran (1–10)</label>
        <input type="number" name="lesson_number"
            value="{{ old('lesson_number', $schedule->lesson_number ?? '') }}"
            class="w-full rounded bg-gray-900 text-gray-100 border-gray-700 px-3 py-2">
    </div>

    {{-- JAM MULAI --}}
    <div>
        <label class="text-gray-200">Jam Mulai</label>
        <input type="time" name="start_time"
            value="{{ old('start_time', $schedule->start_time ?? '') }}"
            class="w-full rounded bg-gray-900 text-gray-100 border-gray-700 px-3 py-2">
    </div>

    {{-- JAM SELESAI --}}
    <div>
        <label class="text-gray-200">Jam Selesai</label>
        <input type="time" name="end_time"
            value="{{ old('end_time', $schedule->end_time ?? '') }}"
            class="w-full rounded bg-gray-900 text-gray-100 border-gray-700 px-3 py-2">
    </div>

    {{-- RUANGAN --}}
    <div>
        <label class="text-gray-200">Ruangan</label>
        <select name="room_id" class="w-full rounded bg-gray-900 text-gray-100 border-gray-700 px-3 py-2">
            @foreach ($rooms as $room)
                <option value="{{ $room->id }}"
                    @selected(old('room_id', $schedule->room_id ?? '') == $room->id)>
                    {{ $room->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- KELAS --}}
    <div>
        <label class="text-gray-200">Kelas</label>
        <select name="class_group_id" class="w-full rounded bg-gray-900 text-gray-100 border-gray-700 px-3 py-2">
            @foreach ($classGroups as $cg)
                <option value="{{ $cg->id }}"
                    @selected(old('class_group_id', $schedule->class_group_id ?? '') == $cg->id)>
                    {{ $cg->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- GURU --}}
    <div>
        <label class="text-gray-200">Guru</label>
        <select name="teacher_id" class="w-full rounded bg-gray-900 text-gray-100 border-gray-700 px-3 py-2">
            @foreach ($teachers as $t)
                <option value="{{ $t->id }}"
                    @selected(old('teacher_id', $schedule->teacher_id ?? '') == $t->id)>
                    {{ $t->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- MAPEL --}}
    <div>
        <label class="text-gray-200">Mata Pelajaran</label>
        <select name="subject_id" class="w-full rounded bg-gray-900 text-gray-100 border-gray-700 px-3 py-2">
            @foreach ($subjects as $s)
                <option value="{{ $s->id }}"
                    @selected(old('subject_id', $schedule->subject_id ?? '') == $s->id)>
                    {{ $s->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-end">
        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">
            Simpan
        </button>
    </div>

</form>
