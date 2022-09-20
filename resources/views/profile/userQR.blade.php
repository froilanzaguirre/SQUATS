<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    .popup{
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        display: none;
        justify-content: center;
        align-items: center;
    }

    .popupcontent{
        height: 550px;
        width: 500px;
        background: white;
        padding: 20px;
        border-radius: 5px;
        position: relative;
        border: 3px solid black;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User QR
            ') }}
        </h2>

        {{-- User Info --}}
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
            
            <div class="mt-4">
                <x-jet-label for="nameToVisit" value="{{ __('Name of Room Owner') }}" />
                <x-jet-input id="nameToVisit" class="block mt-1 w-full" type="text" name="nameToVisit" :value="old('nameToVisit')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="roomToVisit" value="{{ __('Room Number of Visit') }}" />
                <x-jet-input id="roomToVisit" class="block mt-1 w-full" type="text" name="roomToVisit" :value="old('roomToVisit')" required />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4" id="button" >
                    {{ __('Generate QR code') }}
                </x-jet-button>
            </div>
        </form>

        {{-- Popup --}}
        <div class="popup">
            <div class="popupcontent">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="flex items-center justify-center mt-4">
                            <div class="visible-print text-center">
                                <x-jet-label value="{{ __('User QR Code') }}" />
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
            </div>
        </div>

        @if(session()->has('success'))
            
            <script>
                document.querySelector(".popup").style.display = "flex";

                Swal.fire({
                    icon: 'success',
                    title: 'QR Code Generated'
                })
            </script>
        @endif

    </x-slot>
</x-app-layout>

