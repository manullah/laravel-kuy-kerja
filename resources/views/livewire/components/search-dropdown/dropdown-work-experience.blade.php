<div class="relative" x-data="{ isOpen: false }" @click.away="isOpen = false">
    <x-jet-input type="text" wire:model.debounce.500ms="search" placeholder="Work Experience..." x-ref="search"
        @focus="isOpen = true" @keydown="isOpen = true" @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false" />

    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="z-50 absolute right-0 w-full space-y-2 text-gray-600 bg-white border border-gray-300 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700">
        <ul class="divide-y divide-gray-300 dark:divide-gray-600">
            @foreach ($options as $option)
                <li class="p-4 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer"
                    wire:click.prevent="chooseOption({{ $option }})" x-on:click="isOpen = false">
                    {{ $option->name }}
                </li>
            @endforeach
        </ul>
    </div>
</div>
