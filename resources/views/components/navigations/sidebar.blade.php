<!-- Desktop sidebar -->
<aside x-show="isSideMenuOpen"
    class="fixed md:static inset-y-0 z-20 flex-shrink-0 w-64 mt-16 md:mt-0 overflow-y-auto bg-white dark:bg-gray-800"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            {{ $title }}
        </a>
        <ul class="mt-6">
            @foreach ($menus as $menu)
                @if ($menu->show)
                    <li class="relative px-6 py-3">
                        @if ($menu->actived)
                            <span class="absolute inset-y-0 left-0 w-1 bg-primary-600 rounded-tr-lg rounded-br-lg"
                                aria-hidden="true"></span>
                        @endif

                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @if ($menu->actived) text-gray-800 dark:text-gray-100 @endif"
                            href="{{ route($menu->href) }}">
                            {!! $menu->icon !!}
                            <span class="ml-4">{{ $menu->title }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>

<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="md:hidden fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    x-on:click="isSideMenuOpen = !isSideMenuOpen"></div>
