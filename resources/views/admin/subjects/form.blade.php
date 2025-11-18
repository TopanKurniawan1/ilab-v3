<form action="{{ $action }}" method="POST" class="space-y-5">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div>
        <label class="text-gray-100 mb-1">Nama Mapel</label>
        <input type="text" name="name"
               value="{{ old('name', $subject->name ?? '') }}"
               class="w-full rounded-md dark:bg-gray-900 dark:text-gray-100
                      border-gray-300 dark:border-gray-700 px-3 py-2">
    </div>

    <div>
        <label class="text-gray-100 mb-1">Kode Mapel</label>
        <input type="text" name="code"
               value="{{ old('code', $subject->code ?? '') }}"
               class="w-full rounded-md dark:bg-gray-900 dark:text-gray-100
                      border-gray-300 dark:border-gray-700 px-3 py-2">
    </div>

    <div>
        <label class="text-gray-100 mb-1">Jurusan</label>
        <select name="major_id"
                class="w-full rounded-md dark:bg-gray-900 dark:text-gray-100
                       border-gray-300 dark:border-gray-700 px-3 py-2">
            @foreach($majors as $major)
                <option value="{{ $major->id }}"
                        @selected(old('major_id', $subject->major_id ?? '') == $major->id)>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-end">
        <button class="px-4 py-2 bg-blue-600 hover:bg-blue-700
                       text-white rounded shadow">
            Simpan
        </button>
    </div>
</form>
