<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">Tambah Mapel</h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.subjects.form', [
            'action' => route('admin.subjects.store'),
            'method' => 'POST',
            'subject' => null,
        ])
    </div>

</x-app-layout>
