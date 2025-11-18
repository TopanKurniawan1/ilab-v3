<form action="{{ $action }}" method="POST" class="space-y-4">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    {{-- Nama --}}
    <div>
        <label class="text-gray-700 dark:text-gray-300">Nama Tingkatan</label>
        <input type="text" name="name"
            value="{{ old('name', $grade->name ?? '') }}"
            class="w-full rounded-md border-gray-300 dark:border-gray-700
                   dark:bg-gray-900 dark:text-gray-100">
        @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    {{-- Level --}}
    <div>
        <label class="text-gray-700 dark:text-gray-300">Level (10 / 11 / 12)</label>
        <input type="number" name="level"
            value="{{ old('level', $grade->level ?? '') }}"
            class="w-full rounded-md border-gray-300 dark:border-gray-700
                   dark:bg-gray-900 dark:text-gray-100">
        @error('level') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>

    {{-- Button --}}
    <div class="flex justify-end">
        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Simpan
        </button>
    </div>
</form>
