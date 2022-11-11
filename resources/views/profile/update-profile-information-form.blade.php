<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}

    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information, address information and email address.') }}
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

            <!-- <x-jet-label for="photo" value="{{ __('Profile Photo') }}" /> -->
            <div >
            <h3 class="text-lg font-medium text-gray-900"><strong>&nbsp;&nbsp;&nbsp;Profile Photo</strong> </h3>
            </div>
            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-50 w-50 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center" x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-button class="mt-2 mr-2" type="button"  x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-button>

            @if ($this->user->profile_photo_path)
            <x-jet-button type="button" class="mt-2" style="background-color:#BA0D0D ; color:white;" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-button>
            @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif
        <!-- First Name -->

        <div class="col-span-6 sm:col-span-4 mt-auto">
            <x-jet-label for="fname" value="{{ __('First Name') }}" />
            <x-jet-input id="fname" type="text" class="mt-1 inline-block w-full" wire:model.defer="state.fname" autocomplete="fname" />
            <x-jet-input-error for="fname" class="mt-2" />
        </div>
        <!-- Middle Name -->
        <div class="col-span-6 sm:col-span-2 mt-auto">
            <x-jet-label for="mname" value="{{ __('Middle Name') }}" />
            <x-jet-input id="mname" type="text" class="mt-1 block w-full" wire:model.defer="state.mname" autocomplete="mname" />
            <x-jet-input-error for="mname" class="mt-2" />
        </div>
        <!--Last Name -->
        <div class="col-span-6 sm:col-span-2 mt-auto">
            <x-jet-label for="lname" value="{{ __('Last Name') }}" />
            <x-jet-input id="lname" type="text" class="mt-1 block w-full" wire:model.defer="state.lname" autocomplete="lname" />
            <x-jet-input-error for="lname" class="mt-2" />
        </div>
        <!--Civil Status -->
        <div class="col-span-6 sm:col-span-12">
            <x-jet-label for="civilStatus" value="{{ __('Civil Status') }}" />
            <select name="civilStatus" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.civilStatus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
            </select>
        </div>
        <!--Gender -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="gender" value="{{ __('Gender') }}" />
            <x-jet-input id="gender" type="text" class="mt-1 inline-block " wire:model.defer="state.gender" autocomplete="gender" disabled="false" />
            <x-jet-input-error for="gender" class="mt-2" />
        </div>
        <!-- Birthdate -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="birthDate" value="{{ __('Birthdate') }}" />
            <x-jet-input id="birthDate" type="date" class="mt-1 block w-full" wire:model.defer="state.birthDate" autocomplete="birthDate" />
            <x-jet-input-error for="birthDate" class="mt-2" />
        </div>


        <!-- Email -->
        <div class="col-span-6 sm:col-span-12">
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
        <div class="col-span-6 sm:col-span-12 py- 8">
            <hr>
        </div>
        <div class="col-span-6 sm:col-span-12 ">
            
        <h3 class="text-lg font-medium text-gray-600"><strong>Address Information</strong> </h3>

        </div>
        <!-- Province -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="province" value="{{ __('Province') }}" />
            <x-jet-input id="province" type="text" class="mt-1 block w-full" wire:model.defer="state.province" autocomplete="province" />
            <x-jet-input-error for="province" class="mt-2" />
        </div>

        <!-- City -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('City') }}" />
            <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" autocomplete="city" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>

        <!-- Barangay -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="barangay" value="{{ __('Barangay') }}" />
            <x-jet-input id="barangay" type="text" class="mt-1 block w-full" wire:model.defer="state.barangay" autocomplete="barangay" />
            <x-jet-input-error for="barangay" class="mt-2" />
        </div>

        <!-- Unit/Apartment No. -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="unit" value="{{ __('Unit/Apartment No.') }}" />
            <x-jet-input id="unit" type="text" class="mt-1 block w-full" wire:model.defer="state.unit" autocomplete="unit" />
            <x-jet-input-error for="unit" class="mt-2" />
        </div>

        <!-- Floor -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="floor" value="{{ __('Floor') }}" />
            <x-jet-input id="floor" type="text" class="mt-1 block w-full" wire:model.defer="state.floor" autocomplete="floor" />
            <x-jet-input-error for="floor" class="mt-2" />
        </div>

        <!-- Building Name -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="buildingName" value="{{ __('Building Name') }}" />
            <x-jet-input id="buildingName" type="text" class="mt-1 block w-full" wire:model.defer="state.buildingName" autocomplete="buildingName" />
            <x-jet-input-error for="buildingName" class="mt-2" />
        </div>

        <!-- House/Building No. -->
        <div class="col-span-6 sm:col-span-6">
            <x-jet-label for="houseNo" value="{{ __('House/Building No.') }}" />
            <x-jet-input id="houseNo" type="text" class="mt-1 block w-full" wire:model.defer="state.houseNo" autocomplete="houseNo" />
            <x-jet-input-error for="houseNo" class="mt-2" />
        </div>

        <!-- Street Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="streetName" value="{{ __('Street Name') }}" />
            <x-jet-input id="streetName" type="text" class="mt-1 block w-full" wire:model.defer="state.streetName" autocomplete="streetName" />
            <x-jet-input-error for="streetName" class="mt-2" />
        </div>

        <!-- Village/District -->
        <div class="col-span-6 sm:col-span-2">
            <x-jet-label for="district" value="{{ __('Village/District') }}" />
            <x-jet-input id="district" type="text" class="mt-1 block w-full" wire:model.defer="state.district" autocomplete="district" />
            <x-jet-input-error for="district" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-12 py- 8">
            <hr>
        </div>
        
        <div class="col-span-2 sm:col-span-12 ">
        <!-- QR Code -->
        <div class="col-span-2 sm:col-span-6">
            <h3 class="text-lg font-medium text-gray-600"><strong>QR Code Information</strong> </h3>
            <div class="py-5">
                {!! QrCode::size(250)->generate("http://127.0.0.1:8000/user/" . Auth::user()->id); !!}
            </div>
        </div>

        <div class="col-span-1 sm:col-span-1">
            
        </div> 

        {{-- Vaccination Dose --}}
        <div class="col-span-6 sm:col-span-12">
            <x-jet-label for="vaccinedose" value="{{ __('Vaccine Dosage') }}" />
            <select name="vaccinedose" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.vaccinedose">
                <option value="Unvaccinated">Unvaccinated</option>
                <option value="First Dose">First Dose</option>
                <option value="Fully Vaccinated">Fully Vaccinated</option>
                <option value="Fully Vaccinated With Booster">Fully Vaccinated With Booster</option>
            </select>
        </div>

        </div>

    </x-slot>



    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Updated.') }}

        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Update') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>