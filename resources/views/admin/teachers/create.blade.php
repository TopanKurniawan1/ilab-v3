<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-200">
            Tambah Guru
        </h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.teachers.form', [
            'action'  => route('admin.teachers.store'),
            'method'  => 'POST',
            'teacher' => null,
            'majors'  => $majors,
        ])
    </div>

</x-app-layout>
