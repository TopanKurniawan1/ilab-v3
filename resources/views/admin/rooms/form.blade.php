<form action="{{ $action }}" method="POST" class="space-y-5">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    {{-- NAMA --}}
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">Nama Ruangan</label>
        <input type="text" name="name" value="{{ old('name', $room->name ?? '') }}"
               class="w-full rounded-md border-gray-300 dark:border-gray-700
                      dark:bg-gray-900 dark:text-gray-100 px-3 py-2">
    </div>

    {{-- KODE --}}
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">Kode Ruangan</label>
        <input type="text" name="code" value="{{ old('code', $room->code ?? '') }}"
               class="w-full rounded-md border-gray-300 dark:border-gray-700
                      dark:bg-gray-900 dark:text-gray-100 px-3 py-2">
    </div>

    {{-- KAPASITAS --}}
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">Kapasitas</label>
        <input type="number" name="capacity" value="{{ old('capacity', $room->capacity ?? '') }}"
               class="w-full rounded-md border-gray-300 dark:border-gray-700
                      dark:bg-gray-900 dark:text-gray-100 px-3 py-2">
    </div>

    {{-- LOKASI --}}
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">Lokasi</label>
        <input type="text" name="location" value="{{ old('location', $room->location ?? '') }}"
               placeholder="Contoh: Lantai 2 Gedung RPL"
               class="w-full rounded-md border-gray-300 dark:border-gray-700
                      dark:bg-gray-900 dark:text-gray-100 px-3 py-2">
    </div>

    {{-- DESKRIPSI --}}
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">Deskripsi</label>
        <textarea name="description" rows="3"
                  class="w-full rounded-md border-gray-300 dark:border-gray-700
                         dark:bg-gray-900 dark:text-gray-100 px-3 py-2">{{ old('description', $room->description ?? '') }}</textarea>
    </div>

    <div class="flex justify-end">
        <button class="px-4 py-2 rounded-md 
                       bg-blue-600 hover:bg-blue-700 
                       text-white font-medium shadow">
            Simpan
        </button>
    </div>
</form>
