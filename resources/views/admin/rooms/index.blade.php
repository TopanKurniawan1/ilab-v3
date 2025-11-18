<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Daftar Ruangan / Lab
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

        {{-- TOP BAR --}}
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                Data Ruangan
            </h3>

            <a href="{{ route('admin.rooms.create') }}"
               class="px-4 py-2 rounded-md
                      bg-blue-600 hover:bg-blue-700
                      text-white font-medium shadow">
                + Tambah Ruangan
            </a>
        </div>

        {{-- TABEL --}}
        <table class="w-full border-collapse room-table">
            <thead>
                <tr class="border-b dark:border-gray-700 text-gray-200 dark:text-gray-300">
                    <th class="py-3 text-left">Nama</th>
                    <th class="py-3 text-left">Kode</th>
                    <th class="py-3 text-left">Kapasitas</th>
                    <th class="py-3 text-left">Lokasi</th>
                    <th class="py-3 text-left">Deskripsi</th>
                    <th class="py-3 w-40 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($rooms as $room)
                    <tr class="border-b dark:border-gray-700">

                        <td class="py-3 text-gray-200 dark:text-gray-200">
                            {{ $room->name }}
                        </td>

                        <td class="py-3 text-gray-300 dark:text-gray-300">
                            {{ $room->code }}
                        </td>

                        <td class="py-3 text-gray-300 dark:text-gray-300">
                            {{ $room->capacity }} org
                        </td>

                        <td class="py-3 text-gray-300 dark:text-gray-300">
                            {{ $room->location ?? '-' }}
                        </td>

                        <td class="py-3 text-gray-300 dark:text-gray-300">
                            {{ $room->description ?? '-' }}
                        </td>

                        <td class="py-3 flex space-x-2">

                            {{-- EDIT --}}
                            <a href="{{ route('admin.rooms.edit', $room->id) }}"
                               class="px-3 py-1 rounded bg-yellow-500 
                                      hover:bg-yellow-600 text-white text-sm font-medium">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.rooms.destroy', $room->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus ruangan ini?')">
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
                        <td colspan="6" class="py-4 text-center text-gray-500 dark:text-gray-400">
                            Belum ada data ruangan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</x-app-layout>

<style>
    .room-table th,
    .room-table td {
        text-align: left !important;
        padding-left: .75rem !important;
        padding-right: .75rem !important;
    }
</style>
