<form action="{{ $action }}" method="POST" class="space-y-4">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    {{-- Grade --}}
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">Tingkatan</label>
        <select name="grade_id"
                class="w-full rounded-md dark:bg-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-700">
            @foreach($grades as $grade)
                <option value="{{ $grade->id }}"
                    {{ old('grade_id', $classGroup->grade_id ?? '') == $grade->id ? 'selected' : '' }}>
                    {{ $grade->name }} ({{ $grade->level }})
                </option>
            @endforeach
        </select>
    </div>

    {{-- Major --}}
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">Jurusan</label>
        <select name="major_id"
                class="w-full rounded-md dark:bg-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-700">
            @foreach($majors as $major)
                <option value="{{ $major->id }}"
                    {{ old('major_id', $classGroup->major_id ?? '') == $major->id ? 'selected' : '' }}>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Name --}}
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">Nama Kelas</label>
        <input type="text" name="name"
               value="{{ old('name', $classGroup->name ?? '') }}"
               class="w-full rounded-md dark:bg-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-700">
    </div>

    <div class="flex justify-end">
        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Simpan
        </button>
    </div>
</form>
