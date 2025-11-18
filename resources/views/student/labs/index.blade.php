<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Daftar Lab
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($rooms as $room)
            <div class="bg-gray-800 p-5 rounded-lg shadow hover:shadow-lg transition">

                <h3 class="text-xl font-semibold text-white">
                    {{ $room->name }}
                </h3>

                <p class="text-gray-300 mt-1">
                    {{ $room->location ?? 'Lokasi tidak tersedia' }}
                </p>

                <p class="text-gray-400 text-sm mt-1">
                    Kapasitas: {{ $room->capacity ?? '-' }}
                </p>

                <div class="mt-4 flex space-x-2">

                    <a href="{{ route('student.labs.show', $room->id) }}"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700
                               text-white rounded text-sm">
                        Lihat Jadwal
                    </a>

                    <a href="{{ route('student.labs.display', $room->id) }}"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700
                               text-white rounded text-sm">
                        Display TV
                    </a>

                </div>

            </div>
        @endforeach

    </div>

</x-app-layout>
