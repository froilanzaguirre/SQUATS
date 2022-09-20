<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register-step2.post') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <x-jet-label for="province" value="{{ __('Province') }}" />
                <x-jet-input id="province" class="block mt-1 w-full" type="text" name="province" />
            </div>

            <div class="mt-4">
                <x-jet-label for="city" value="{{ __('City') }}" />
                <x-jet-input id="city" class="block mt-1 w-full" type="text" name="city" />
            </div>

            <div class="mt-4">
                <x-jet-label for="barangay" value="{{ __('Barangay') }}" />
                <x-jet-input id="barangay" class="block mt-1 w-full" type="text" name="barangay" />
            </div>

            <div class="mt-4">
                <x-jet-label for="unit" value="{{ __('Unit') }}" />
                <x-jet-input id="unit" class="block mt-1 w-full" type="text" name="unit" />
            </div>

            <div class="mt-4">
                <x-jet-label for="floor" value="{{ __('Floor') }}" />
                <x-jet-input id="floor" class="block mt-1 w-full" type="text" name="floor" />
            </div>

            <div class="mt-4">
                <x-jet-label for="buildingName" value="{{ __('Building Name') }}" />
                <x-jet-input id="buildingName" class="block mt-1 w-full" type="text" name="buildingName" />
            </div>

            <div class="mt-4">
                <x-jet-label for="houseNo" value="{{ __('House/Building No.') }}" />
                <x-jet-input id="houseNo" class="block mt-1 w-full" type="text" name="houseNo" />
            </div>

            <div class="mt-4">
                <x-jet-label for="streetName" value="{{ __('Street Name') }}" />
                <x-jet-input id="streetName" class="block mt-1 w-full" type="text" name="streetName" />
            </div>

            <div class="mt-4">
                <x-jet-label for="district" value="{{ __('Village/District') }}" />
                <x-jet-input id="district" class="block mt-1 w-full" type="text" name="district" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Next') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
