{{-- BACKDROP (Mobile Only) --}}
<div 
    class="fixed inset-0 bg-black/40 z-40 md:hidden"
    x-show="sidebarOpen"
    @click="sidebarOpen = false"
    x-transition.opacity
    x-cloak>
</div>

{{-- SIDEBAR --}}
<aside 
    class="fixed inset-y-0 left-0 w-64 
            bg-white dark:bg-gray-700 
            shadow-2xl md:shadow-none
           border-r border-gray-200 dark:border-gray-700 
           shadow-lg md:shadow-none
           transform transition-transform duration-300 z-50
           md:static md:translate-x-0"
    x-show="sidebarOpen"
    x-transition
    x-cloak
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">

    <div class="h-16 flex items-center px-6 border-b border-gray-200 dark:border-gray-700">
        <span class="text-xl font-semibold text-gray-800 dark:text-gray-100">
            iLab <span class="text-blue-600">v3</span>
        </span>
    </div>

    <nav class="px-4 py-4 space-y-2">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
            class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span class="material-icons-outlined mr-2">dashboard</span>
            <span>Dashboard</span>
        </a>

        {{-- Jurusan --}}
        <a href="{{ route('admin.majors.index') }}"
            class="sidebar-item {{ request()->routeIs('admin.majors.*') ? 'active' : '' }}">
            <span class="material-icons-outlined mr-2">category</span>
            <span>Jurusan</span>
        </a>

        {{-- Tambahkan menu admin lain --}}
    </nav>
</aside>

<style>
    .sidebar-item {
        @apply flex items-center px-3 py-2 rounded-lg text-sm font-medium
               text-gray-700 dark:text-gray-300
               hover:bg-gray-100 dark:hover:bg-gray-700;
    }
    .sidebar-item.active {
        @apply bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-white;
    }
</style>
