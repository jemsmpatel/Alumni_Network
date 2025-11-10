<nav class="bg-gray-800 text-white fixed top-0 w-full px-4 py-5 z-10">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <a href="#" class="text-3xl font-bold">Alumni Network</a>

        <!-- Hamburger Icon for Mobile -->
        <div class="md:hidden">
            <button onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>
        </div>

        <!-- Nav Links (Desktop) -->
        <ul class="hidden md:flex space-x-9 items-center nav-underline text-xl mr-3">
            <li><a href="/admin" class="hover:text-yellow-400 transition"><span>Dashboard</span></a></li>
            <li><a href="/admin/member" class="hover:text-yellow-400 transition"><span>Members</span></a></li>
            <li><a href="/admin/event" class="hover:text-yellow-400 transition"><span>Events</span></a></li>
            <li><a href="/admin/post" class="hover:text-yellow-400 transition"><span>Post</span></a></li>
            <li><a href="/admin/alumni" class="hover:text-yellow-400 transition"><span>Alumni</span></a></li>
            <li><a href="/admin/contact" class="hover:text-yellow-400 transition"><span>Contact</span></a></li>
        </ul>

        <!-- Buttons (Desktop) -->
        <div class="hidden md:flex space-x-2">
            @auth
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div class="text-white text-xl">{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Authentication -->
                            <a href="/settings" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Settings</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @else
                <a href="/login" class="border border-white px-4 py-1 rounded hover:bg-white hover:text-gray-800 font-semibold transition">Login</a>
                @if (Route::has('register'))
                    <a href="/register" class="border border-white px-4 py-1 rounded hover:bg-white hover:text-gray-800 font-semibold transition">Sign Up</a>
                @endif
            @endauth
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="md:hidden mt-3 hidden space-y-2 px-2">
        <a href="/admin/" class="block py-1 hover:text-yellow-400">Dashboard</a>
        <a href="/admin/member" class="block py-1 hover:text-yellow-400">Members</a>
        <a href="/admin/event" class="block py-1 hover:text-yellow-400">Events</a>
        <a href="/admin/post" class="block py-1 hover:text-yellow-400">Post</a>
        <a href="/admin/alumni" class="block py-1 hover:text-yellow-400">Alumni</a>
        <a href="/admin/contact" class="block py-1 hover:text-yellow-400">Contact</a>
        @auth
            <div class="flex flex-col border-t border-gray-700 pt-2 space-y-2">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="text-white text-xl">{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <a href="/settings" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">Settings</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        @else
            <a href="/login" class="block py-1 border-t border-gray-700 pt-2 text-sm hover:text-yellow-400">Login</a>
            @if (Route::has('register'))
                <a href="/register" class="block py-1 text-sm hover:text-yellow-400">Sign Up</a>
            @endif
        @endauth
    </div>
</nav>
<style>
    .nav-underline span {
        position: relative;
        display: inline-block;
    }

    .nav-underline span::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 0;
        height: 2px;
        background-color: #ffcc00;
        transition: width 0.3s ease;
    }

    .nav-underline span:hover::after {
        width: 100%;
    }

    .carousel-item {
        display: none;
    }

    .carousel-item.active {
        display: block;
    }
</style>