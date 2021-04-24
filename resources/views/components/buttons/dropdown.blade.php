<div x-data="{ isProfileMenuOpen: false }" class="relative">
    <button x-on:click="isProfileMenuOpen = !isProfileMenuOpen"
        x-on:keydown.escape="isProfileMenuOpen = !isProfileMenuOpen" aria-label="Account" aria-haspopup="true"
        class="align-middle">
        @if (isset($button))
            {{ $button }}
        @endif
    </button>

    <template x-if="isProfileMenuOpen">
        <div x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            x-on:click.away="isProfileMenuOpen = !isProfileMenuOpen"
            x-on:keydown.escape="isProfileMenuOpen = !isProfileMenuOpen"
            class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
            aria-label="submenu">
            {{ $slot }}
        </div>
    </template>
</div>
