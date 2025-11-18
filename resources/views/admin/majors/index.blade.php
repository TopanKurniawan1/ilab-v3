<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Daftar Jurusan
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">

        {{-- Title + Button --}}
        <div class="flex items-center justify-between mb-6 pl-2">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                Data Jurusan
            </h3>

            <a href="{{ route('admin.majors.create') }}"
               class="px-4 py-2 rounded-md 
                      bg-blue-600 hover:bg-blue-700 
                      text-white font-medium shadow">
                + Tambah Jurusan
            </a>
        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">
            <table class="w-full major-table border-collapse">

                <thead>
                    <tr class="border-b dark:border-gray-700 text-gray-700 dark:text-gray-300">

                        <th class="py-3 pl-2 text-left !text-left w-[40%]">
                            Nama
                        </th>

                        <th class="py-3 pl-2 text-left !text-left w-[20%]">
                            Kode
                        </th>

                        <th class="py-3 pl-2 text-left !text-left w-[20%]">
                            Warna
                        </th>

                        <th class="py-3 pl-2 text-left !text-left w-[20%]">
                            Aksi
                        </th>

                    </tr>
                </thead>

                <tbody>
                    @forelse($majors as $major)
                        <tr class="border-b dark:border-gray-700">

                            <td class="py-3 pl-2 text-gray-800 dark:text-gray-200">
                                {{ $major->name }}
                            </td>

                            <td class="py-3 pl-2 text-gray-700 dark:text-gray-300">
                                {{ $major->code ?? '-' }}
                            </td>

                            <td class="py-3 pl-2">
                                <span class="px-3 py-1 rounded text-sm"
                                      style="background: {{ $major->color ?? '#ccc' }};">
                                    {{ $major->color ?? 'N/A' }}
                                </span>
                            </td>

                            <td class="py-3 pl-2 flex space-x-2">
                                <a href="{{ route('admin.majors.edit', $major->id) }}"
                                   class="px-3 py-1 rounded bg-yellow-500 
                                          hover:bg-yellow-600 text-white 
                                          text-sm font-medium">
                                    Edit
                                </a>

                                <form method="POST"
                                      action="{{ route('admin.majors.destroy', $major->id) }}"
                                      onsubmit="return confirm('Hapus jurusan ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="px-3 py-1 rounded bg-red-600 
                                                   hover:bg-red-700 text-white 
                                                   text-sm font-medium">
                                        Hapus
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-500 dark:text-gray-400">
                                Belum ada data jurusan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</x-app-layout>
<style>
    .major-table th {
        text-align: left !important;
    }
</style>
