<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">Tambah Jadwal</h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.schedules.form', [
            'action' => route('admin.schedules.store'),
            'method' => 'POST',
            'schedule' => null
        ])
    </div>

</x-app-layout>
