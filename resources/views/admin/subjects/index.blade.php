<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Daftar Mata Pelajaran
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-100">
                Data Mapel
            </h3>

            <a href="{{ route('admin.subjects.create') }}"
               class="px-4 py-2 bg-blue-600 hover:bg-blue-700
                      text-white rounded shadow font-medium">
                + Tambah Mapel
            </a>
        </div>

        <table class="w-full border-collapse subject-table text-gray-100">
            <thead>
                <tr class="border-b border-gray-700 text-gray-200">
                    <th class="py-3 text-left">Nama</th>
                    <th class="py-3 text-left">Kode</th>
                    <th class="py-3 text-left">Jurusan</th>
                    <th class="py-3 text-left w-40">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($subjects as $subject)
                    <tr class="border-b border-gray-700 text-gray-200">

                        <td class="py-3">{{ $subject->name }}</td>

                        <td class="py-3">{{ $subject->code ?? '-' }}</td>

                        <td class="py-3">{{ $subject->major->name }}</td>

                        <td class="py-3 flex items-center space-x-2">
                            <a href="{{ route('admin.subjects.edit', $subject->id) }}"
                               class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600
                                      text-white rounded text-sm">
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.subjects.destroy', $subject->id) }}"
                                  onsubmit="return confirm('Hapus mapel ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-600 hover:bg-red-700
                                               text-white rounded text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-400">
                            Belum ada data mapel.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</x-app-layout>

<style>
    .subject-table th,
    .subject-table td {
        padding-left: 1rem;
        padding-right: 1rem;
        text-align: left;
    }
</style>
