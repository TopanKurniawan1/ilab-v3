<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Daftar Kelas
        </h2>
    </x-slot>

    <div class="bg-gray-800 p-6 rounded-lg shadow">

        {{-- TOP BAR --}}
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-semibold text-white">
                Data Rombongan Belajar
            </h3>

            <a href="{{ route('admin.class-groups.create') }}"
               class="px-4 py-2 rounded-md 
                      bg-blue-600 hover:bg-blue-700 
                      text-white font-medium shadow">
                + Tambah Kelas
            </a>
        </div>

        {{-- TABLE --}}
        <table class="w-full border-collapse class-table">
            <thead>
                <tr class="border-b border-gray-700 text-white">
                    <th class="py-3 text-left">Nama Kelas</th>
                    <th class="py-3 text-left">Tingkatan</th>
                    <th class="py-3 text-left">Jurusan</th>
                    <th class="py-3 w-40 text-left">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($classGroups as $cg)
                    <tr class="border-b border-gray-700">

                        <td class="py-3 text-white">
                            {{ $cg->name }}
                        </td>

                        <td class="py-3 text-white">
                            {{ $cg->grade->name }}
                        </td>

                        <td class="py-3 text-white">
                            {{ $cg->major->name }}
                        </td>

                        <td class="py-3 flex space-x-2">

                            {{-- EDIT BUTTON --}}
                            <a href="{{ route('admin.class-groups.edit', $cg->id) }}"
                               class="px-3 py-1 rounded bg-yellow-500 
                                      hover:bg-yellow-600 text-white text-sm font-medium">
                                Edit
                            </a>

                            {{-- DELETE BUTTON --}}
                            <form action="{{ route('admin.class-groups.destroy', $cg->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Hapus kelas ini?')">
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
                        <td colspan="4" class="py-4 text-center text-gray-300">
                            Belum ada data kelas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

</x-app-layout>

<style>
    .class-table th,
    .class-table td {
        text-align: left !important;
        padding-left: .75rem !important;
    }
</style>
