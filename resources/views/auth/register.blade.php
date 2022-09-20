<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-jet-label for="usertype" value="{{ __('Type') }}" />
                <select name="usertype" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="Resident">Resident</option>
                    <option value="Visitor">Visitor</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="fname" value="{{ __('First Name') }}" />
                <x-jet-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autofocus autocomplete="fname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="mname" value="{{ __('Middle Name') }}" />
                <x-jet-input id="mname" class="block mt-1 w-full" type="text" name="mname" :value="old('mname')" required autofocus autocomplete="mname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="lname" value="{{ __('Last Name') }}" />
                <x-jet-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="suffix" value="{{ __('Suffix') }}" />
                <x-jet-input id="suffix" class="block mt-1 w-full" type="text" name="suffix" :value="old('suffix')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="civilStatus" value="{{ __('Civil Status') }}" />
                <select name="civilStatus" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="gender" value="{{ __('Gender') }}" />
                <input type="radio" name="gender" value="Male" checked>
                <label for="gender">Male</label>
                <input class="ml-1" type="radio" name="gender" value="Female">
                <label for="gender">Female</label>
            </div>

            <div class="mt-4">
                <x-jet-label for="birthDate" value="{{ __('Birth Date') }}" />
                <x-jet-input id="birthDate" class="block mt-1 w-full" type="date" name="birthDate" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Next') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
