<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Daftar Tingkatan
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

        {{-- TOP BAR --}}
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                Data Tingkatan
            </h3>

            <a href="{{ route('admin.grades.create') }}"
               class="px-4 py-2 rounded-md 
                      bg-blue-600 hover:bg-blue-700 
                      text-white font-medium shadow">
                + Tambah Tingkatan
            </a>
        </div>

        {{-- TABEL --}}
        <table class="w-full border-collapse grade-table">
            <thead>
                <tr class="border-b dark:border-gray-700 text-gray-700 dark:text-gray-300">
                    <th class="py-3 text-left">Nama</th>
                    <th class="py-3">Level</th>
                    <th class="py-3 w-40">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($grades as $grade)
                    <tr class="border-b dark:border-gray-700">

                        <td class="py-3 text-gray-800 dark:text-gray-200">
                            {{ $grade->name }}
                        </td>

                        <td class="py-3 text-gray-700 dark:text-gray-300">
                            {{ $grade->level }}
                        </td>

                        <td class="py-3 flex space-x-2">

                            {{-- EDIT BUTTON --}}
                            <a href="{{ route('admin.grades.edit', $grade->id) }}"
                               class="px-3 py-1 rounded bg-yellow-500 
                                      hover:bg-yellow-600 text-white text-sm font-medium">
                                Edit
                            </a>

                            {{-- DELETE BUTTON --}}
                            <form action="{{ route('admin.grades.destroy', $grade->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus tingkatan ini?')">
                                @csrf
                                @method('DELETE')

                                <button
                                    class="px-3 py-1 rounded bg-red-600 
                                           hover:bg-red-700 text-white text-sm font-medium">
                                    Hapus
                                </button>
                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 text-center text-gray-500 dark:text-gray-400">
                            Belum ada data tingkatan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</x-app-layout>
<style>
    .grade-table th,
    .grade-table td {
        text-align: left !important;
    }

    /* FIX yang memastikan tulisan rapat kiri */
    .grade-table th > *,
    .grade-table td > * {
        display: block !important;
        text-align: left !important;
        margin-left: 0 !important;
    }
</style>
