<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">Edit Mapel</h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
        @include('admin.subjects.form', [
            'action' => route('admin.subjects.update', $subject->id),
            'method' => 'PUT',
            'subject' => $subject,
        ])
    </div>

</x-app-layout>
