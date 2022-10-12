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
            margin-left:340px;
            width: 60px;
            height: 30px;
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
      <h2 class="title">Step 2/3 - Location</h2>  
        <div class="left-container">

        <br><br><br><br>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register-step2.post') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <x-jet-label for="province" class="details" value="{{ __('Province') }}" />
                <x-jet-input id="province" class="input-box" type="text" name="province" />
            </div>

            <div class="mt-4">
                <x-jet-label for="city" class="details" value="{{ __('City') }}" />
                <x-jet-input id="city" class="input-box" type="text" name="city" />
            </div>

            <div class="mt-4">
                <x-jet-label for="barangay" class="details" value="{{ __('Barangay') }}" />
                <x-jet-input id="barangay" class="input-box" type="text" name="barangay" />
            </div>

            <div class="mt-4">
                <x-jet-label for="unit" class="details" value="{{ __('Unit') }}" />
                <x-jet-input id="unit" class="input-box" type="text" name="unit" />
            </div>

            <div class="mt-4">
                <x-jet-label for="floor" class="details" value="{{ __('Floor') }}" />
                <x-jet-input id="floor" class="input-box" type="text" name="floor" />
            </div>

            <div class="mt-4">
                <x-jet-label for="buildingName" class="details" value="{{ __('Building Name') }}" />
                <x-jet-input id="buildingName" class="input-box" type="text" name="buildingName" />
            </div>

            <div class="mt-4">
                <x-jet-label for="houseNo" class="details" value="{{ __('House/Building No.') }}" />
                <x-jet-input id="houseNo" class="input-box" type="text" name="houseNo" />
            </div>

            <div class="mt-4">
                <x-jet-label for="streetName" class="details" value="{{ __('Street Name') }}" />
                <x-jet-input id="streetName" class="input-box" type="text" name="streetName" />
            </div>

            <div class="mt-4">
                <x-jet-label for="district" class="details" value="{{ __('Village/District') }}" />
                <x-jet-input id="district" class="input-box" type="text" name="district" />
            </div>

            
            <div class="flex items-right justify-end mt-4">
                <x-jet-button class="btn">
                    {{ __('Next') }}
                </x-jet-button>
   
        </form>
</x-guest-layout>
