<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="space-y-5">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    {{-- NAMA --}}
    <div>
        <label class="block text-gray-200 dark:text-gray-200 mb-1">Nama Guru</label>
        <input type="text" name="name"
               value="{{ old('name', $teacher->name ?? '') }}"
               class="w-full rounded-md 
                      dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700
                      text-white px-3 py-2">
    </div>

    {{-- EMAIL --}}
    <div>
        <label class="block text-gray-200 dark:text-gray-200 mb-1">Email</label>
        <input type="email" name="email"
               value="{{ old('email', $teacher->email ?? '') }}"
               class="w-full rounded-md 
                      dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700
                      text-white px-3 py-2">
    </div>

    {{-- GENDER --}}
    <div>
        <label class="block text-gray-200 dark:text-gray-200 mb-1">Jenis Kelamin</label>
        <select name="gender"
                class="w-full rounded-md
                       dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700
                       text-white px-3 py-2">
            <option class="text-black" value="">-- Pilih --</option>
            <option class="text-black" value="L" {{ old('gender', $teacher->gender ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option class="text-black" value="P" {{ old('gender', $teacher->gender ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    {{-- PHONE --}}
    <div>
        <label class="block text-gray-200 dark:text-gray-200 mb-1">Nomor HP</label>
        <input type="text" name="phone"
               value="{{ old('phone', $teacher->phone ?? '') }}"
               class="w-full rounded-md 
                      dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700
                      text-white px-3 py-2">
    </div>

    {{-- MAJOR --}}
    <div>
        <label class="block text-gray-200 dark:text-gray-200 mb-1">Jurusan</label>
        <select name="major_id"
                class="w-full rounded-md
                       dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700
                       text-white px-3 py-2">
            @foreach($majors as $major)
                <option class="text-black"
                    value="{{ $major->id }}"
                    {{ old('major_id', $teacher->major_id ?? '') == $major->id ? 'selected' : '' }}>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- PHOTO --}}
    <div>
        <label class="block text-gray-200 dark:text-gray-200 mb-1">Foto Guru</label>

        @if(!empty($teacher->photo))
            <img src="{{ asset('storage/' . $teacher->photo) }}"
                 class="h-20 w-20 rounded-full object-cover mb-2">
        @endif

        <input type="file" name="photo"
               class="w-full rounded-md 
                      dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700
                      text-white px-3 py-2">
    </div>

    <div class="flex justify-end">
        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700
                       text-white rounded shadow">
            Simpan
        </button>
    </div>

</form>
