<header x-data="{ showMobileMenu: false }" class="bg-white shadow sticky top-0 z-10 ">
    <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex px-2 lg:px-0">
                <h5 class="flex-shrink-0 flex items-center">
                    <a href="{{ route('index') }}">
                        Kuy Kerja
                    </a>
                </h5>
                <nav aria-label="Global" class="hidden lg:ml-6 lg:flex lg:items-center lg:space-x-4">
                    @foreach ($menus as $menu)
                        @if ($menu->show)
                            <a href="{{ $menu->href }}" class="px-3 py-2 text-gray-900 text-sm font-medium">
                                {{ $menu->title }}
                            </a>
                        @endif
                    @endforeach
                </nav>
            </div>

            <div class="flex items-center lg:hidden ml-auto">
                <!-- Mobile menu button -->
                <button type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
                    aria-expanded="false" x-on:click="showMobileMenu = !showMobileMenu">
                    <span class="sr-only">Open main menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Mobile menu, show/hide based on mobile menu state. -->
            <div class="lg:hidden">
                <div x-show="showMobileMenu" class="z-20 fixed inset-0 bg-black bg-opacity-25" aria-hidden="true"
                    x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="duration-150 ease-in"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    x-on:click="showMobileMenu = !showMobileMenu"></div>

                <div x-show="showMobileMenu"
                    class="z-30 absolute top-0 right-0 max-w-none w-full p-2 transition transform origin-top"
                    x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-150 ease-in"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                    <div
                        class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
                        <div class="pt-3 pb-2">
                            <div class="flex items-center justify-between px-4">
                                <h5 class="font-bold">
                                    Kuy Kerja
                                </h5>
                                <div class="-mr-2">
                                    <button type="button"
                                        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"
                                        x-on:click="showMobileMenu = !showMobileMenu">
                                        <span class="sr-only">Close menu</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-3 px-2 space-y-1">
                                @foreach ($menus as $menu)
                                    @if ($menu->show)
                                        <a href="{{ $menu->href }}"
                                            class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">
                                            {{ $menu->title }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="pt-4 pb-2">
                            {{-- <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80"
                                    alt="">
                            </div>
                            <div class="ml-3">
                                <div class="text-base font-medium text-gray-800">Whitney Francis</div>
                                <div class="text-sm font-medium text-gray-500">whitney@example.com</div>
                            </div>
                        </div> --}}
                            <div class="mt-3 px-2 space-y-1">
                                <a href="{{ route('profile.show') }}"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">
                                    <span>Profil</span>
                                </a>

                                <a href="{{ route('logout') }}"
                                    class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800"
                                    role="menuitem" tabindex="-1" id="user-menu-item-1"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Keluar
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden lg:ml-4 lg:flex lg:items-center">
                <!-- Profile dropdown -->
                @if (Auth::user())
                    <x-general.buttons.dropdown>
                        <x-slot name="button">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button type="button"
                                    class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                                </button>
                            @else
                                <button type="button"
                                    class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @endif
                        </x-slot>

                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                            role="menuitem" tabindex="-1" id="user-menu-item-0">
                            <span>Profil</span>
                        </a>

                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                            tabindex="-1" id="user-menu-item-1"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Keluar
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </x-general.buttons.dropdown>
                @else
                    <div>
                        <a href="{{ route('login') }}">Login</a>
                        <span class="mx-1">/</span>
                        <a href="{{ route('register') }}">Sign up</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="border-t border-gray-200 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <div class="flex sm:hidden">
                    <a href="{{ route('index') }}"
                        class="group inline-flex space-x-3 text-sm font-medium text-gray-500 hover:text-gray-700">
                        <!-- Heroicon name: solid/arrow-narrow-left -->
                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-600"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Back to Applicants</span>
                    </a>
                </div>
                <div class="hidden sm:block">
                    <ol class="flex items-center space-x-4">
                        <li>
                            <div>
                                <a href="{{ route('index') }}" class="text-gray-400 hover:text-gray-500">
                                    <!-- Heroicon name: solid/home -->
                                    <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                    </svg>
                                    <span class="sr-only">Home</span>
                                </a>
                            </div>
                        </li>

                        @foreach ($breadcrumbs as $breadcrumb)
                            <li>
                                <div class="flex items-center">
                                    <svg class="flex-shrink-0 h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                                    </svg>
                                    <a href="{{ $breadcrumb->href }}"
                                        class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">
                                        {{ $breadcrumb->name }}
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </nav>
        </div>
    </div>
</header>
