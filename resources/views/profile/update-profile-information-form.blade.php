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
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
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
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
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

     <!-- First Name -->
   
     <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="fname" value="{{ __('First Name') }}" />
            <x-jet-input id="fname" type="text" class="mt-1 block w-full" wire:model.defer="state.fname" autocomplete="fname" />
            <x-jet-input-error for="fname" class="mt-2" />
        </div>
        <!-- Middle Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="mname" value="{{ __('Middle Name') }}" />
            <x-jet-input id="mname" type="text" class="mt-1 block w-full" wire:model.defer="state.mname" autocomplete="mname" />
            <x-jet-input-error for="mname" class="mt-2" />
        </div>
        <!--Last Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lname" value="{{ __('Last Name') }}" />
            <x-jet-input id="lname" type="text" class="mt-1 block w-full" wire:model.defer="state.lname" autocomplete="lname" />
            <x-jet-input-error for="lname" class="mt-2" />
        </div>
        <!--Civil Status -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="civilStatus" value="{{ __('Civil Status') }}" />
           <select name="civilStatus" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.civilStatus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </select>
        </div>
         <!--Gender -->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gender" value="{{ __('Gender') }}" />
            <x-jet-input id="gender" type="text" class="mt-1 block w-full" wire:model.defer="state.gender" autocomplete="gender" disabled="true" />
            <x-jet-input-error for="gender" class="mt-2" />
        </div>
        <!-- Birthdate -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="birthDate" value="{{ __('Birthdate') }}" />
            <x-jet-input id="birthDate" type="birthDate" class="mt-1 block w-full" wire:model.defer="state.birthDate" />
            <x-jet-input-error for="birthDate" class="mt-2" />
        </div>    
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
