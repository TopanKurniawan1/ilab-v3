<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Data Jurusan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Tombol Tambah --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.majors.create') }}"
                   class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Tambah Jurusan
                </a>
            </div>

            {{-- Tabel Jurusan --}}
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b p-3 text-left">#</th>
                            <th class="border-b p-3 text-left">Nama Jurusan</th>
                            <th class="border-b p-3 text-left">Kode</th>
                            <th class="border-b p-3 text-left">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($majors as $major)
                            <tr>
                                <td class="border-b p-3">{{ $major->id }}</td>
                                <td class="border-b p-3">{{ $major->name }}</td>
                                <td class="border-b p-3">{{ $major->code ?? '-' }}</td>

                                <td class="border-b p-3">
                                    <a href="{{ route('admin.majors.edit', $major) }}"
                                       class="text-blue-600 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.majors.destroy', $major) }}"
                                          method="POST" class="inline-block ml-2"
                                          onsubmit="return confirm('Yakin hapus jurusan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-3 text-center text-gray-500">
                                    Belum ada data jurusan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination jika diperlukan --}}
                <div class="mt-4">
                    {{ $majors->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
