<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User QR
            ') }}
        </h2>

        <div class="popup">
            <div class="popupcontent">

            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-center mt-4">
                    <div class="visible-print text-center">
                        <x-jet-label value="{{ __('User QR Code') }}" />
                        {{-- {!! QrCode::size(350)->generate(
                            "Name: " . Auth::user()->fname . " " . Auth:: user()->lname . "\n" .
                            "Email: " . Auth::user()->email . "\n" .
                            "Address: " . Auth::user()->city . "\n" .
                            "Gender: " . Auth::user()->gender . "\n" .
                            "Contact Number: " . Auth::user()->contactNumber . "\n" .
                            "Date of Visit: " . Auth::user()->dateOfVisit . "\n" .
                            "Purpose of Visit: " . Auth::user()->purposeOfVisit . "\n" 
                            ); !!} --}}
                            {!! QrCode::size(300)->generate(
                                "http://127.0.0.1:8000/user/" . Auth::user()->id
                                ); !!}
                    </div>
                </div>

                <!-- Name -->
                <div class="flex items-center justify-center mt-4">
                    {{ Auth::user()->fname }}
                </div>
                
                <!-- Buttons -->
                <div class="flex items-center justify-center mt-4">
                    <x-jet-button class="ml-4">
                        {{ __('Download QR code') }}
                    </x-jet-button>
                </div>
            </div>
        </div>

        User info
        <div class="row">
            Name : {{ Auth::user()->fname }}
        </div>
        <div class="row">
            Email : {{ Auth::user()->email }}
        </div>
        <div class="row">
            Address : {{ Auth::user()->city }}
        </div>
        <div class="row">
            Gender : {{ Auth::user()->gender }}
        </div>
        <div class="row">
            Contact Number : {{ Auth::user()->contactNumber }}
        </div>

        

        <form method="POST" action="{{ route('userQR.post') }}" enctype="multipart/form-data">
        @csrf
            <div class="mt-4">
                <x-jet-label for="dateOfVisit" value="{{ __('Date of Visit') }}" />
                <x-jet-input id="dateOfVisit" class="block mt-1 w-full" type="date" name="dateOfVisit" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="purposeOfVisit" value="{{ __('Purpose of Visit') }}" />
                <x-jet-input id="purposeOfVisit" class="block mt-1 w-full" type="text" name="purposeOfVisit" :value="old('purposeOfVisit')" required />
            </div>
            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4" >
                    {{ __('Generate QR code') }}
                </x-jet-button>
            </div>
        </form>

        <style>
        </style>

    </x-slot>
</x-app-layout>
