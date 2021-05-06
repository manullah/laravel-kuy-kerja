<div class="card">
    <h1 class="text-3xl font-extrabold text-gray-900 mb-5">Profile</h1>

    <!-- Tabs -->
    <div class="overflow-x-auto mb-5">
        <div class="border-b border-gray-200">
            <nav class="tabs">
                @foreach ($tabs as $tab)
                    @if ($tab->show)
                        <button wire:click="changeTab({{ $tab->id }})" class=" @if ($tab->actived) active @endif item">
                            {{ $tab->title }}
                        </button>
                    @endif
                @endforeach
            </nav>
        </div>
    </div>

    @foreach ($tabs as $tab)
        @if ($tab->show && $tab->actived)

            @if ($tab->id == 1)
                @livewire('profile.forms.update-profile-information')
            @endif

            @if ($tab->id == 2)
                @livewire('profile.update-password-form')
            @endif

            @if ($tab->id == 3)
                @livewire('profile.two-factor-authentication-form')
            @endif

            @if ($tab->id == 4)
                @livewire('profile.logout-other-browser-sessions-form')
            @endif

            @if ($tab->id == 5)
                @livewire('profile.delete-user-form')
            @endif

        @endif
    @endforeach
</div>
