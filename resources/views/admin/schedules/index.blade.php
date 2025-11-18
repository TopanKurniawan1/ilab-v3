<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">Daftar Jadwal</h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">

        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-100">Data Jadwal</h3>

            <a href="{{ route('admin.schedules.create') }}"
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
                + Tambah Jadwal
            </a>
        </div>

        <table class="w-full border-collapse schedule-table">
            <thead>
                <tr class="border-b border-gray-700 text-gray-200">
                    <th class="py-3 text-left">Hari</th>
                    <th class="py-3 text-left">Jam Ke</th>
                    <th class="py-3 text-left">Jam</th>
                    <th class="py-3 text-left">Ruangan</th>
                    <th class="py-3 text-left">Kelas</th>
                    <th class="py-3 text-left">Guru</th>
                    <th class="py-3 text-left">Mapel</th>
                    <th class="py-3 w-36 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($schedules as $s)
                    <tr class="border-b border-gray-700 text-gray-300">

                        <td class="py-3">{{ ucfirst($s->day) }}</td>

                        <td class="py-3">{{ $s->lesson_number }}</td>

                        <td class="py-3">
                            {{ substr($s->start_time,0,5) }} - {{ substr($s->end_time,0,5) }}
                        </td>

                        <td class="py-3">{{ $s->room->name }}</td>

                        <td class="py-3">{{ $s->classGroup->name }}</td>

                        <td class="py-3">{{ $s->teacher->name }}</td>

                        <td class="py-3">{{ $s->subject->name }}</td>

                        <td class="py-3 flex space-x-2">

                            <a href="{{ route('admin.schedules.edit', $s->id) }}"
                                class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded">
                                Edit
                            </a>

                            <form action="{{ route('admin.schedules.destroy', $s->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus jadwal ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-4 text-center text-gray-400">
                            Belum ada jadwal.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</x-app-layout>
