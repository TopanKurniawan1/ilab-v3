<aside
    class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 
           transform transition-transform duration-300 ease-in-out z-40
           md:translate-x-0" 
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

    <div class="h-16 flex items-center px-6 border-b border-gray-200 dark:border-gray-700">
        <span class="text-xl font-semibold text-gray-800 dark:text-gray-100">
            iLab <span class="text-blue-600">v3</span>
        </span>
    </div>

    <nav class="px-4 py-4 space-y-2">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-3 py-2 rounded-lg text-sm font-medium
            {{ request()->routeIs('dashboard') 
                ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-200' 
                : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'
            }}">
            <span class="material-icons-outlined mr-2">dashboard</span>
            <span>Dashboard</span>
        </a>

        {{-- Lab --}}
        <a href="{{ route('admin.rooms.index') }}"
            class="flex items-center px-3 py-2 rounded-lg text-sm font-medium
            {{ request()->routeIs('admin.rooms.*')
                ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-200'
                : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'
            }}">
            <span class="material-icons-outlined mr-2">folder</span>
            <span>Lab</span>
        </a>

        {{-- Jurusan --}}
        <a href="{{ route('admin.majors.index') }}"
            class="flex items-center px-3 py-2 rounded-lg text-sm font-medium
            {{ request()->routeIs('admin.majors.*') 
                ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-200' 
                : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'
            }}">
            <span class="material-icons-outlined mr-2">category</span>
            <span>Jurusan</span>
        </a>

        {{-- Guru --}}
        <a href="{{ route('admin.teachers.index') }}"
            class="flex items-center px-3 py-2 rounded-lg text-sm font-medium
            {{ request()->routeIs('admin.teachers.*')
                ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-200'
                : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'
            }}">
            <span class="material-icons-outlined mr-2">people</span>
            <span>Guru</span>
        </a>

        {{-- Mapel --}}
        <a href="{{ route('admin.subjects.index') }}"
            class="flex items-center px-3 py-2 rounded-lg text-sm font-medium
            {{ request()->routeIs('admin.subjects.*') 
                ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-200'
                : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'
            }}">
            <span class="material-icons-outlined mr-2">library_books</span>
            <span>Mapel</span>
        </a>

        {{-- Jadwal --}}
        <a href="{{ route('admin.schedules.index') }}"
            class="flex items-center px-3 py-2 rounded-lg text-sm font-medium
            {{ request()->routeIs('admin.schedules.*')
                ? 'bg-blue-100 dark:bg-blue-900/40 text-blue-700 dark:text-blue-200'
                : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700'
            }}">
            <span class="material-icons-outlined mr-2">schedule</span>
            <span>Jadwal Lab</span>
        </a>

    </nav>

    <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-700 text-xs text-gray-500 dark:text-gray-400 mt-auto">
        iLab v3 · {{ date('Y') }}
    </div>

</aside>
