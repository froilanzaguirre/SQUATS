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
             .img1{
                padding-top:90px;
                padding-left:45px;
                padding-bottom:10px;
                align-items: center;
                z-index: 6;
            }

            .img1 img{
                width: 300px;
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
            margin: 1px 0;
            color:  #1C2833;
            font-size: 2rem;
            }

            .btn{
            display: block;
            width: 350px;
            height: 50px;
            outline: none;
            border: none;
            background-color:#21618C;
            background-size: 200%;
            font-size: 1.4rem;
            font-weight:800;
            padding-top: 9px;
            padding-bottom: 6px;
            color: white;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
            }

            .btn:hover {
            background-color: #1988D1;
            }
            .input-box{
            margin-bottom: 15px;
            width: 350px;
            height:40px;
            }
            .details{
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
            font-size: 15px
            }
</style>

</head>
    <body class="antialiased">
    <div class="container">
		<div class="img">
			<img src="images/bg.png">
		</div>

      <div class="forms-container">
      <div class="img1">
			<img src="images/squats-bg.png">
		</div>
        <div class="left-container">


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
                <x-jet-label for="password" class="details" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="input-box" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
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
                    <a class="underline text-md text-info-600 hover:text-success-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </form>
</x-guest-layout>
