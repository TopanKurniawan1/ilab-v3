<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Edit Jurusan
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.majors.form', [
            'action' => route('admin.majors.update', $major->id),
            'method' => 'PUT',
            'major' => $major,
        ])
    </div>
</x-app-layout>
