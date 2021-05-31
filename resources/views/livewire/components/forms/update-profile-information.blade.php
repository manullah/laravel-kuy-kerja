<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                        class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                        x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phone" value="{{ __('Phone') }}" />
            <x-jet-input id="phone" type="text" class="mt-1 block w-full" wire:model="state.phone" />
            <x-jet-input-error for="phone" class="mt-2" />
        </div>

        <!-- Country -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country_id" value="{{ __('Country') }}" />
            <select id="country_id" class="mt-1 block w-full input" wire:model="state.country_id">
                <option value="null" disabled selected>Choose</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->value }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="country_id" class="mt-2" />
        </div>

        <!-- Province -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="province_id" value="{{ __('Province') }}" />
            <select id="province_id" class="mt-1 block w-full input" wire:model="state.province_id">
                <option value="null" disabled selected>Choose</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->value }}">{{ $province->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="province_id" class="mt-2" />
        </div>

        <!-- City -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city_id" value="{{ __('City') }}" />
            <select id="city_id" class="mt-1 block w-full input" wire:model="state.city_id">
                <option value="null" disabled selected>Choose</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->value }}">{{ $city->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="city_id" class="mt-2" />
        </div>

        <!-- District -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="district_id" value="{{ __('District') }}" />
            <select id="district_id" class="mt-1 block w-full input" wire:model="state.district_id">
                <option value="null" disabled selected>Choose</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->value }}">{{ $district->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="district_id" class="mt-2" />
        </div>

        <!-- Village -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="village_id" value="{{ __('Village') }}" />
            <select id="village_id" class="mt-1 block w-full input" wire:model="state.village_id">
                <option value="null" disabled selected>Choose</option>
                @foreach ($villages as $village)
                    <option value="{{ $village->value }}">{{ $village->name }}</option>
                @endforeach
            </select>
            <x-jet-input-error for="village_id" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <textarea id="address" rows="3" class="mt-1 block w-full input" wire:model="state.address"></textarea>
            <x-jet-input-error for="address" class="mt-2" />
        </div>

        @if (Auth::user()->isSearcher())
            <div x-data="{cvName: null, cvPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Cv File Input -->
                <input type="file" class="hidden" wire:model="cv" x-ref="cv" x-on:change="
                                    cvName = $refs.cv.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        cvPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.cv.files[0]);
                            " />

                <x-jet-label for="cv" value="{{ __('Cv') }}" />
                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.cv.click()">
                    {{ __('Select A New Cv') }}
                </x-jet-secondary-button>

                @if ($this->user->userDetail->searcher_cv_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfileCv">
                        {{ __('Remove Cv') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="cv" class="mt-2" />
            </div>
        @endif
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="cv">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
