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

    .form{
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
        color: black;
    }

    .btn{
            display: block;
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
            border:none;
    }
    .btn:hover{
        background-position: right;
        color: black;
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
        .form{
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
		<div class="form">
				<img src="images/squats-bg.png" style="max-width: 100%; height: auto"><br><br>
            <x-jet-validation-errors class="mb-4" />
    
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" class="details" value="{{ __('Email/Username') }}" />
                <x-jet-input id="email"  class="input-box" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" class="details1" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="input-box" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="remember">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-md text-gray-600">{{ __('Remember me') }}</span>
                </label>

            <div class="block mt-4">
                  <x-jet-button class="btn">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-md text-blue hover:text-success-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>



</x-guest-layout>

<script>
        const inputs = document.querySelectorAll(".input");


    function addcl(){
        let parent = this.parentNode.parentNode;
        parent.classList.add("focus");
    }

    function remcl(){
        let parent = this.parentNode.parentNode;
        if(this.value == ""){
            parent.classList.remove("focus");
        }
    }


    inputs.forEach(input => {
        input.addEventListener("focus", addcl);
        input.addEventListener("blur", remcl);
    });
<script>
