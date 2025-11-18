<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Tambah Ruangan / Lab
        </h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.rooms.form', [
            'action' => route('admin.rooms.store'),
            'method' => 'POST',
            'room' => null,
        ])
    </div>

</x-app-layout>
