<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<style>
    .container{
        position: relative;
    }
    .container .popup{
        height: 30%;
        width: 52%;
        top: 350px;
        right:  380px;
        justify-content: center;
        align-items: center;
        position: absolute;
        display:none;
        z-index: 7;
    }
    .container .popup:after{
        height: 30%;
        width: 52%;
        top: 350px;
        right: 380px;
        justify-content: center;
        align-items: center;
        position: absolute;
        display: block;
        z-index: 7;
        }
    .container .popup .popupcontent{
        height: 650px;
        width: 500px;
        background: white;
        padding: 20px;
        border-radius: 5px;
        position: relative;
        border: 3px solid black;
    }
    .close-btn{
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 18px;
        cursor: pointer;
    }
    .top-container{
        width: 100vw;
        height: 100vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap:15.2rem;
        padding: 0 2rem;
        overflow: hidden;
        position: absolute;      
    }
    .img{
        display: flex;
        justify-content: flex-end;
        align-items: center;
        z-index: 6;
        padding-top:40px;
    }
    .img img{
        width: 500px;
    }
    .left-container {
        margin-top:15px;
        position: absolute;
        top: 45%;
        transform: translate(-50%, -50%);
        left: 70%;
        width: 50%;
        transition: 1s 0.7s ease-in-out;
        display: grid;
    }
    .left-form {
        display: flex;
        align-items: left;
        justify-content: left;
        flex-direction: column;
        padding: 0rem 5rem;
        transition: all 0.2s 0.7s;
        overflow: hidden;
        grid-column: 1 / 2;
        grid-row: 1 / 2;
    }
    .row{
        display: flex;
        align-items: left;
        justify-content: left;
        font-size: 1.1rem;
        margin-bottom: 3px;
    }
    .top-container:before {
        content: "";
        position: absolute;
        height: 1900px;
        width: 2000px;
        top: 43%;
        right: 57%;
        transform: translateY(-50%);
        background-color:#65B0BD;
        transition: 1.8s ease-in-out;
        border-radius: 10%;
        z-index: 6;
    }   
    h2{
        margin: 1px 0;
        color:  #1C2833;
        font-size: 2rem;
    }
    .btn{
        background-color:blue;
        color:white;    
        margin-left:5px;
        width: 153px;
        height: 30px;
    }
    .btn:hover {
        background-color:#1988D1;
   }
    .input-box{
        margin-bottom: 1px;
        width: 650px;
        height:30px;
    }
    .details{
        display: block;
        font-weight: 900;
        margin-bottom: 1px;
        font-size: 1rem;
    }
    .name{
        margin: 1px 0;
        color:  #1C2833;
        font-size: 1.7rem;
        justify-content: flex-end;
        align-items: center;
        font-weight: 900;
        margin-bottom: 2px;
    }    
</style>

<x-guest-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visitor Request') }}
        </h2>
        </x-slot>

<body class="antialiased">
            
    {{-- Popup --}}
    <div class="container">
        <div class="popup">
            <div class="popupcontent">
                
                <div class="py-12 max-w-7xl mx-auto sm:px-4 lg:px-3 ">
                
                <span id="close" onclick="this.parentNode.parentNode.remove(); return false;">
                <label class="close-btn fas fa-times" title="close"></label>
            </span>
                
                    <!-- QR Code -->
                    <div class="flex items-center justify-center mt-4">
                        <div class="visible-print text-center">
                                {!! QrCode::size(320)->generate("http://127.0.0.1:8000/user/" . $qrid); !!}
                        </div>
                    </div>

                    {{-- <div class="flex items-center justify-center">
                    <!-- Name -->
                    <div class="name">
                        
                        {{ Auth::user()->fname }}
                        {{ Auth::user()->mname }}
                        {{ Auth::user()->lname }}
                    </div>
                    </div>
                    <div class="flex items-center justify-center">
                    <!-- Classification -->
                    <div class="name">
                        {{ Auth::user()->usertype }}
                    </div>
                    </div> --}}
                    <!-- Buttons -->
                    <div class="flex items-center justify-center mt-4">
                        <x-jet-button class="ml-4" id="downloadQR">
                            {{ __('Download QR code') }}
                        </x-jet-button>
                        </div>
                    <div class="flex items-center justify-center mt-4">
                        <x-jet-button class="ml-4 bg-danger" id="downloadQR">
                            {{ __('Download Digital ID') }}
                        </x-jet-button>
                    </div>

                </div>
            </div>
        </div>
        </div>
           
    <div class="top-container">
		<div class="img">
			<img src="images/bg.png">
		</div>

      <div class="forms-container">
        <div class="left-container">
          <div class="left-form">
          <br><br><br>

    {{-- User Info --}}
    <h2 class="name">Visitor Request Form</h2> 


    <form method="POST" action="{{ route('userQR.post') }}" enctype="multipart/form-data">
        @csrf
            <div class="mt-4">
                <x-jet-label for="name" class="details" value="{{ __('Full Name') }}" />
                <x-jet-input id="name" class="input-box" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" class="details" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="input-box" type="email" name="email" :value="old('email')" required />
            </div>
            
            <div class="block mt-4">
                <x-jet-label for="gender" class="details" value="{{ __('Gender') }}" />
                <input type="radio" name="gender" value="Male" checked>
                <label for="gender">Male</label>
                <input class="ml-1" type="radio" name="gender" value="Female">
                <label for="gender">Female</label>
            </div>

            <div class="mt-4">
                <x-jet-label for="contactNumber" class="details" value="{{ __('Contact Number') }}" />
                <x-jet-input id="contactNumber" class="input-box" type="text" name="contactNumber" />
            </div>

            <div class="mt-4">
                <x-jet-label for="dateOfVisit" value="{{ __('Date of Visit') }}" />
                <x-jet-input id="dateOfVisit" class="input-box" type="date" name="dateOfVisit" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="purposeOfVisit" value="{{ __('Purpose of Visit') }}" />
                <x-jet-input id="purposeOfVisit" class="input-box" type="text" name="purposeOfVisit" :value="old('purposeOfVisit')" required />
            </div>
            
            <div class="mt-4">
                <x-jet-label for="nameToVisit" value="{{ __('Name of Room Owner') }}" />
                <x-jet-input id="nameToVisit" class="input-box" type="text" name="nameToVisit" :value="old('nameToVisit')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="roomToVisit" value="{{ __('Room Number of Visit') }}" />
                <x-jet-input id="roomToVisit" class="input-box" type="text" name="roomToVisit" :value="old('roomToVisit')" required />
            </div>

            {{-- Vaccination Dose --}}
            <x-jet-label for="vaccinedose" value="{{ __('Vaccine Dosage') }}" />
            <select name="vaccinedose" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="state.vaccinedose">
                <option value="walapa">Wala pa eh</option>
                <option value="firstdose">First Dose</option>
                <option value="full">Fully Vaccinated</option>
                <option value="boost">Fully Vaccinated With Booster</option>
                <option value="bullmark">Fully Boosted with chupacabra</option>
            </select>

            <div class="mt-4">
                <x-jet-label for="vaccine" class="details" value="{{ __('Vaccination Card') }}" />
                <x-jet-input id="vaccine" class="input-box" type="file" name="vaccine" required />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="ml-4" id="generate" >
                    {{ __('Generate QR code') }}
                </x-jet-button>
            </div>
        </form>
		</div>

        </div>
        </div>
    </div>
</body>  
    
</x-guest-layout>


@if(session()->has('generated'))
    
    <script>
        document.querySelector(".popup").style.display = "flex";

        Swal.fire({
        icon: 'success',
        title: 'QR Code has been Generated',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif
