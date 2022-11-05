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
            padding-top:28px;
            padding-left:0px;
            color:  #1C2833;
            font-size: 1.7rem;
            font-weight:700;
            }

            .btn{
            background-color:#21618C;
            color:white;
            margin-left:10px;
            width: 60px;
            height: 30px;
            }

            .btn:hover {
            background-color:#1988D1;
            }
            .input-box{
            width: 400px;
            height:40px;
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
      <h2 class="title">Step 1/3 - Personal Information</h2>  
        <div class="left-container">
      
        <x-jet-validation-errors class="mb-4" />

        <br><br><br>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-jet-label for="usertype" class="details" value="{{ __('Type') }}"/>
                <select name="usertype" class="input-box">
                    <option value="Resident">Resident</option>
                    <option value="Resident">Staff</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label for="fname" class="details" value="{{ __('First Name') }}" />
                <x-jet-input id="fname" class="input-box" type="text" name="fname" :value="old('fname')" required autofocus autocomplete="fname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="mname" class="details" value="{{ __('Middle Name') }}" />
                <x-jet-input id="mname" class="input-box" type="text" name="mname" :value="old('mname')" required autofocus autocomplete="mname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="lname" class="details" value="{{ __('Last Name') }}" />
                <x-jet-input id="lname" class="input-box" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
            </div>

            <div class="mt-4">
                <x-jet-label for="suffix" class="details" value="{{ __('Suffix') }}" />
                <x-jet-input id="suffix" class="input-box" type="text" name="suffix" :value="old('suffix')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="civilStatus" class="details" value="{{ __('Civil Status') }}" />
                <select name="civilStatus" class="input-box">
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>

            <div class="block mt-4">
                <x-jet-label for="gender" class="details" value="{{ __('Gender') }}" />
                <input type="radio" name="gender" value="Male" checked>
                <label for="gender">Male</label>
                <input class="ml-1" type="radio" name="gender" value="Female">
                <label for="gender">Female</label>
            </div>            

            <div class="mt-4">
                <x-jet-label for="birthDate" class="details" value="{{ __('Birth Date') }}" />
                <x-jet-input id="birthDate" class="input-box" type="date" name="birthDate" />
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
                <a class="underline text-md text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a> 

                <x-jet-button class="btn">
                    {{ __('Next') }}
                </x-jet-button>
            </div>
        </form>
   
</x-guest-layout>
