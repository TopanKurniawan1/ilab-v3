<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">Edit Jadwal</h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.schedules.form', [
            'action' => route('admin.schedules.update', $schedule->id),
            'method' => 'PUT',
            'schedule' => $schedule
        ])
    </div>

</x-app-layout>
