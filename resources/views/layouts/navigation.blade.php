<nav x-data="{ open: false, adminMenu: false }"
     class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- LEFT: Admin Menu Button -->
            <div class="flex items-center">

                @auth
                    @if(Auth::user()->role === 'admin')
                        <div class="relative">

                            {{-- BUTTON (animated) --}}
<button
    @click="adminMenu = !adminMenu"
    class="rounded-md 
           bg-gray-100 dark:bg-gray-700 
           text-gray-700 dark:text-gray-300
           hover:bg-gray-200 dark:hover:bg-gray-600
           border border-gray-300 dark:border-gray-600
           shadow-sm transition
           w-12 h-12 flex items-center justify-center">

    <span class="relative w-7 h-7 flex items-center justify-center">

        {{-- ICON MENU --}}
        <span
            class="material-icons-outlined absolute inset-0 flex items-center justify-center
                   transition-opacity duration-150 text-3xl"
            x-show="!adminMenu"
            x-transition.opacity
            x-cloak>
            menu
        </span>

        {{-- ICON CLOSE --}}
        <span
            class="material-icons-outlined absolute inset-0 flex items-center justify-center
                   transition-opacity duration-150 text-3xl"
            x-show="adminMenu"
            x-transition.opacity
            x-cloak>
            close
        </span>

    </span>

</button>
                            {{-- FLOATING ADMIN MENU --}}
                            <div
                                x-show="adminMenu"
                                @click.outside="adminMenu = false"
                                x-transition
                                        class="fixed left-4 mt-2 w-[320px]
                                       bg-white dark:bg-gray-800 
                                       rounded-lg shadow-xl border
                                       border-gray-200 dark:border-gray-700
                                       z-50">

                                <div class="py-2 text-gray-700 dark:text-gray-300">

                                    <a href="{{ route('dashboard') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Dashboard
                                    </a>

                                    <a href="{{ route('admin.majors.index') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Jurusan
                                    </a>

                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Guru
                                    </a>

                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Mapel
                                    </a>

                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        Jadwal Lab
                                    </a>

                                </div>

                            </div>

                        </div>
                    @endif
                @endauth

            </div>

            <!-- RIGHT: Default Breeze User Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm 
                                   text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800
                                   hover:text-gray-700 dark:hover:text-gray-300 
                                   transition">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ms-1 h-4 w-4" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 
                                       10.586l3.293-3.293a1 1 0 111.414 
                                       1.414l-4 4a1 1 0 01-1.414 
                                       0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

        </div>
    </div>

</nav>
