<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-200">
            Tambah Kelas
        </h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.class-groups.form', [
            'action' => route('admin.class-groups.store'),
            'method' => 'POST',
            'classGroup' => null,
            'grades' => $grades,
            'majors' => $majors,
        ])
    </div>

</x-app-layout>
