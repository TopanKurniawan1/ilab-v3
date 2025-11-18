<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-200">
            Edit Kelas
        </h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.class-groups.form', [
            'action' => route('admin.class-groups.update', $classGroup->id),
            'method' => 'PUT',
            'classGroup' => $classGroup,
            'grades' => $grades,
            'majors' => $majors,
        ])
    </div>

</x-app-layout>
