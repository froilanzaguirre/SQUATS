<x-guest-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SQUATS:Security System</title>
        <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body{
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
    }

    .wave{
        position: fixed;
        bottom: 0;
        left: 0;
        height: 100%;
        z-index: -1;
    }

    .container{
        width: 100vw;
        height: 100vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap :7rem;
        padding: 0 2rem;
    }

    .img{
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .login-content{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
    }

    .img img{
        width: 500px;
    }

    form{
        width: 450px;
    }

    .login-content img{
        height: 100px;
    }

    .i{
        color: #d9d9d9;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .i i{
        transition: .3s;
    }

    a{
        color:blue;
        display: flex;
        justify-content: center;
        align-items: center;
        outline: none !important;
        border: none !important;        
        text-decoration: none !important;
        box-shadow: none !important;
        -webkit-tap-highlight-color: transparent !important;
        -webkit-user-select: none; /* Chrome/Safari */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* IE10+ */
        user-select: none;
    }
    a:hover{
        color: white;
    }

    .btn{
            display: block;
            border:none;
            outline:none;
            width: 100%;
            height: 50px;
            background-color:#21618C;
            background-size: 200%;
            font-size: 1.5rem;
            padding-top: 11px;
            padding-bottom: 5px;
            color: white;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
            border-radius: 15px;
    }
    .btn:hover{
        background-position: right;
    }
    .input-box{
            width: 400px;
            height:40px;
            }
    .details{
        font-weight: 500;
        margin-bottom: 5px;
        margin-right:18rem;
        font-size: 15px;
    }
    .details1{
        font-weight: 500;
        margin-bottom: 5px;
        margin-right:21rem;
        font-size: 15px;
    }
    
    h2{
            padding-top:28px;
            padding-left:0px;
            color:  #1C2833;
            font-size: 1.7rem;
            font-weight:700;
    }


    @media screen and (max-width: 1050px){
        .container{
            grid-gap: 5rem;
        }
    }

    @media screen and (max-width: 1000px){
        form{
            width: 290px;
        }

        .login-content h2{
            font-size: 1.5rem;
            margin: 8px 0;
        }
        .input-box{
            width: 300px;
            height:40px;
        }

        .img img{
            width: 400px;
        }
    }

    @media screen and (max-width: 900px){
        .container{
            grid-template-columns: 1fr;
        }

        .img{
            display: none;
        }

        .wave{
            display: none;
        }

        .login-content{
            justify-content: center;
        }
    }
</style>

</head>
    <body>
    <img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/bg.png">
		</div>
        <div class="login-content">
			<form action="index.html">
				<img src="images/squats-bg.png" style="max-width: 100%; height: auto"><br><br>
      
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
