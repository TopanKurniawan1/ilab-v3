<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Jadwal {{ $room->name }}
        </h2>
    </x-slot>

    {{-- Tabs Hari --}}
    <div class="flex space-x-2 mb-6">
        @foreach ($days as $key => $label)
            <button
                onclick="loadDay('{{ $key }}')"
                id="tab-{{ $key }}"
                class="px-4 py-2 rounded 
                       {{ $key === $activeDay ? 'bg-blue-600 text-white' : 'bg-gray-700 text-gray-200' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    {{-- Tabel Jadwal --}}
    <div class="bg-gray-800 p-5 rounded-lg shadow">
        <table class="w-full schedule-table text-gray-200">
            <thead>
                <tr class="border-b border-gray-700">
                    <th class="py-3 text-left">Jam ke</th>
                    <th class="py-3 text-left">Waktu</th>
                    <th class="py-3 text-left">Kelas</th>
                    <th class="py-3 text-left">Guru</th>
                    <th class="py-3 text-left">Mapel</th>
                </tr>
            </thead>

            <tbody id="schedule-body">
                <tr>
                    <td colspan="5" class="py-4 text-center text-gray-400">
                        Memuat jadwal...
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function loadDay(day) {
            fetch(`{{ url('/student/labs/'.$room->id.'/day') }}/${day}`)
                .then(res => res.json())
                .then(data => {
                    let html = '';
                    if (data.length === 0) {
                        html = `
                            <tr>
                                <td colspan="5" class="py-4 text-center text-gray-400">
                                    Tidak ada jadwal.
                                </td>
                            </tr>`;
                    } else {
                        data.forEach(row => {
                            html += `
                                <tr class="border-b border-gray-700">
                                    <td class="py-3">${row.lesson_number}</td>
                                    <td class="py-3">${row.start_time.substring(0,5)} - ${row.end_time.substring(0,5)}</td>
                                    <td class="py-3">${row.class_group.name}</td>
                                    <td class="py-3">${row.teacher.name}</td>
                                    <td class="py-3">${row.subject.name}</td>
                                </tr>
                            `;
                        });
                    }
                    document.getElementById('schedule-body').innerHTML = html;

                    // Active tab styling
                    document.querySelectorAll('[id^="tab-"]').forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('bg-gray-700', 'text-gray-200');
                    });
                    let active = document.getElementById('tab-' + day);
                    active.classList.add('bg-blue-600', 'text-white');
                });
        }

        loadDay('{{ $activeDay }}');
    </script>

</x-app-layout>
