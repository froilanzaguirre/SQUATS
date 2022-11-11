<x-guest-layout>
   
<style>
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            body,
            input {
            font-family: "Poppins", sans-serif;
            }

            .container{
                width: 100vw;
                height: 100vh;
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                grid-gap:15.2rem;
                padding: 0 2rem;
                overflow: hidden;
                position: relative;
            }

            .img{
                display: flex;
                justify-content: flex-end;
                align-items: center;
                z-index: 6;
                padding-top:70px;
            }

            .img img{
                width: 500px;
            }
           

            .left-container {
                position: absolute;
                top: 57%;
                transform: translate(-50%, -50%);
                left: 70%;
                width: 50%;
                transition: 1s 0.7s ease-in-out;
                display: grid;
                grid-template-columns: 1fr;
                z-index: 5;
                }

            form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0rem 5rem;
            transition: all 0.2s 0.7s;
            overflow: hidden;
            grid-column: 1 / 2;
            grid-row: 1 / 2;
            }

            form.left-form {
            z-index: 2;
            }

            .container:before {
            content: "";
            position: absolute;
            height: 2000px;
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
            padding-top:140px;
            color:  #1C2833;
            font-size: 1.7rem;
            font-weight:700;
            }

            .btn{
            background-color:#21618C;
            color:white;
            margin-left:240px;
            width: 163px;
            height: 35px;
            text-align:center;
            }
            
            .btn:hover {
            background-color:#1988D1;
            }
            .input-box{
            width: 400px;
            height:35px;
            }
            .details{
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            font-size: 15px;
            align-items:left;
            }
</style>

</head>
    <body class="antialiased">
    <div class="container">
		<div class="img">
			<img src="images/bg.png">
		</div>
      <div class="forms-container">
      <h2 class="title">Step 3/3 - Create your account</h2>  
        <div class="left-container">

        <br><br><br><br>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register-step3.post') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <x-jet-label for="email" class="details" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="input-box" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="contactNumber" class="details" value="{{ __('Contact Number') }}" />
                <x-jet-input id="contactNumber" class="input-box" type="text" name="contactNumber" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="details" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="input-box" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" class="details" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="input-box" type="password" name="password_confirmation" required autocomplete="new-password" />
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

            <div class="mt-4">
                <x-jet-label for="vaccine" class="details" value="{{ __('Vaccination Card') }}" />
                <x-jet-input id="vaccine" class="input-box" type="file" name="vaccine" required />
            </div>

             <div class="block mt-4">
                  <x-jet-button class="btn">
                    {{ __('Finish Registration') }}
                </x-jet-button>
            </div>
        </form>
   
</x-guest-layout>
