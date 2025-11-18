<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-200">
            Edit Guru
        </h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.teachers.form', [
            'action'  => route('admin.teachers.update', $teacher->id),
            'method'  => 'PUT',
            'teacher' => $teacher,
            'majors'  => $majors,
        ])
    </div>

</x-app-layout>
