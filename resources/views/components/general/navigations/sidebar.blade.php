<div x-show="isSideMenuOpen"
    class="fixed lg:relative col-span-2 bg-white lg:bg-transparent left-0 top-16 lg:top-0 bottom-0 p-5 lg:p-0 z-50 w-52 lg:w-auto"
    x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform -translate-x-20">
    <nav aria-label="Sidebar" class="sticky top-24 divide-y divide-gray-300">
        <div class="pb-8 space-y-1">
            @foreach ($menus as $menu)
                @if ($menu->show)
                    <a href="{{ route($menu->href) }}"
                    class="group flex items-center px-3 py-2 text-sm font-medium rounded-md @if ($menu->actived) bg-gray-200 text-gray-900 @else text-gray-600
                        hover:bg-gray-50 @endif"
                        aria-current="page">
                        <!-- Heroicon name: outline/home -->
                        <span class="flex-shrink-0 -ml-1 mr-3 h-6 w-6 @if ($menu->actived) text-gray-500 @else text-gray-400 group-hover:text-gray-500 @endif">
                            {!! $menu->icon !!}
                        </span>
                        <span class="truncate">
                            {{ $menu->title }}
                        </span>
                    </a>
                @endif
            @endforeach
        </div>
    </nav>
</div>

<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="md:hidden fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    x-on:click="isSideMenuOpen = !isSideMenuOpen"></div>
