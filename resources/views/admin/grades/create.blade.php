<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Tambah Tingkatan
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.grades.form', [
            'action' => route('admin.grades.store'),
            'method' => 'POST',
            'grade' => null,
        ])
    </div>

</x-app-layout>
