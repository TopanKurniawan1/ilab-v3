<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-100">
            Daftar Guru
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

        {{-- TOP BAR --}}
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-gray-100">
                Data Guru
            </h3>

            <a href="{{ route('admin.teachers.create') }}"
               class="px-4 py-2 rounded-md 
                      bg-blue-600 hover:bg-blue-700 
                      text-white font-medium shadow">
                + Tambah Guru
            </a>
        </div>

        {{-- TABLE --}}
        <table class="w-full border-collapse teacher-table text-gray-100">
            <thead>
                <tr class="border-b border-gray-700 text-gray-100">
                    <th class="py-3 text-left">Foto</th>
                    <th class="py-3 text-left">Nama</th>
                    <th class="py-3 text-left">Email</th>
                    <th class="py-3 text-left">Gender</th>
                    <th class="py-3 text-left">Jurusan</th>
                    <th class="py-3 text-left w-44">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($teachers as $teacher)
                    <tr class="border-b border-gray-700 text-gray-200">

                        {{-- FOTO --}}
<td class="py-3">
    @if($teacher->photo)
        <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-700 flex items-center justify-center">
            <img src="{{ asset('storage/' . $teacher->photo) }}"
                 class="w-full h-full object-cover object-center rounded-full aspect-square">
        </div>
    @else
        <div class="w-10 h-10 rounded-full bg-gray-700 flex items-center justify-center">
            <span class="text-gray-300 text-xs">-</span>
        </div>
    @endif
</td>

                        {{-- NAMA --}}
                        <td class="py-3 text-gray-100">
                            {{ $teacher->name }}
                        </td>

                        {{-- EMAIL --}}
                        <td class="py-3 text-gray-100">
                            {{ $teacher->email }}
                        </td>

                        {{-- GENDER --}}
                        <td class="py-3 text-gray-100">
                            {{ $teacher->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>

                        {{-- JURUSAN --}}
                        <td class="py-3 text-gray-100">
                            {{ $teacher->major->name ?? '-' }}
                        </td>

                        {{-- AKSI --}}
                        <td class="py-3 flex items-center space-x-2">

                            {{-- EDIT --}}
                            <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                               class="px-3 py-1 rounded bg-yellow-500 
                                      hover:bg-yellow-600 text-white text-sm font-medium">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus guru ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 rounded bg-red-600 
                                           hover:bg-red-700 text-white text-sm font-medium">
                                    Hapus
                                </button>
                            </form>

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-center text-gray-400">
                            Belum ada data guru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</x-app-layout>

<style>
    .teacher-table th,
    .teacher-table td {
        text-align: left !important;
        padding-left: 1rem;
        padding-right: 1rem;
    }
</style>
