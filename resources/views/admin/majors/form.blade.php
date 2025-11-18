<form action="{{ $action }}" method="POST" class="space-y-4">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    {{-- Nama Jurusan --}}
    <div>
        <label class="text-gray-700 dark:text-gray-300">Nama Jurusan</label>
        <input type="text" name="name"
               value="{{ old('name', $major->name ?? '') }}"
               class="w-full rounded-md border-gray-300 dark:border-gray-700
                      dark:bg-gray-900 dark:text-gray-100">
        @error('name')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

    {{-- Kode --}}
    <div>
        <label class="text-gray-700 dark:text-gray-300">Kode</label>
        <input type="text" name="code"
               value="{{ old('code', $major->code ?? '') }}"
               class="w-full rounded-md border-gray-300 dark:border-gray-700
                      dark:bg-gray-900 dark:text-gray-100">
    </div>

    {{-- Warna --}}
    <div>
        <label class="text-gray-700 dark:text-gray-300">Warna</label>

        @php
            $colorValue = old('color', $major->color ?? '#3b82f6');
        @endphp

        <div class="flex items-center space-x-3 mt-1">

            {{-- Color Picker --}}
            <input 
                type="color"
                id="color_picker"
                class="h-10 w-16 rounded border border-gray-300 dark:border-gray-600 
                       bg-white dark:bg-gray-700 cursor-pointer"
                value="{{ $colorValue }}"
            >

            {{-- HEX Manual Input --}}
            <input 
                type="text"
                id="color_hex"
                name="color"
                class="w-32 px-3 py-2 rounded border border-gray-300 dark:border-gray-700
                       dark:bg-gray-900 dark:text-gray-100"
                value="{{ $colorValue }}"
            >
        </div>

        <p class="text-xs text-gray-500 mt-1">
            Pilih warna atau masukkan kode HEX.
        </p>
    </div>

    {{-- Button --}}
    <div class="flex justify-end">
        <button
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Simpan
        </button>
    </div>
</form>

{{-- Sinkronisasi Color Picker <-> HEX --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const picker = document.getElementById('color_picker');
        const hex = document.getElementById('color_hex');

        picker.addEventListener('input', () => {
            hex.value = picker.value;
        });

        hex.addEventListener('input', () => {
            if (/^#([0-9A-F]{3}){1,2}$/i.test(hex.value)) {
                picker.value = hex.value;
            }
        });
    });
</script>
