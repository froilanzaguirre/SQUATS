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
            height: 40px;
            background-color:#21618C;
            background-size: 200%;
            font-size: 1.2rem;
            padding-top: 7px;
            padding-bottom: 15px;
            color: white;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem;
            cursor: pointer;
            transition: .5s;
            border-radius: 5px;
            border:none;
    }
    .btn:hover{
        background-position: right;
        color: black;
    }
    .input-box{
            width: 250px;
            height:30px;
            }
    .details{
        font-weight: 500;
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


    @media screen and (max-width: 1000px){
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
            width: 200px;
            height:40px;
        }

        .img img{
            width: 400px;
        }
        .btn{
            display: block;
            width: 93%;
            height: 40px;
            background-color:#21618C;
            background-size: 200%;
            font-size: 1rem;
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
   
        <div class="mb-4 text-sm text-info-600">
            {{ __('Forgot your password?') }}
        </div>
        <br>
        <div class="mb-4 text-sm text-gray-100">
            {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <br>
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" class="details" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="input-box" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="block mt-4">
                  <x-jet-button class="btn">
                  {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>

</x-guest-layout>
