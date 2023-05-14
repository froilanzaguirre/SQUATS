<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
___________________________________________________________________________________________________________
___________________________________________________________________________________________________________

--------------------------HINDI ITO KASAMA SA SYSTEM WAG NYO TO GAGALAWIN----------------------------------
___________________________________________________________________________________________________________
___________________________________________________________________________________________________________

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    h2{
        margin-left:0.8rem;
        font-size:1.5rem;
        font-weight:bold;

    }
    h3{
        margin-left:1rem;
        font-size:20px;
    }
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins',sans-serif;
    }
    body{
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    overflow:hidden;
    }
    .container{
    max-width: 700px;
    width: 100%;
    height:100%;
    background-color: #fff;
    padding: 25px 40px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }
    .container .title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
    }
    .container .title::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    border-radius: 5px;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }
    .content form .user-details{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
    }
    form .user-details .input-box{
    margin-bottom: 4px;
    width: calc(100% / 2 - 5px);
    }
    form .input-box span.details{
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
    }
    form .input-vax{
    display: flex;
    font-weight: 500;
    margin-bottom: 1px;
    margin-left:1.5rem;
    }
    .input-box{
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 16px;
    border-radius: 5px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    }
    .user-details .input-box input:focus,
    .user-details .input-box input:valid{
    border-color: #9b59b6;
    }

    form .category{
    display: flex;
    width: 80%;
    margin: 14px 0 ;
    justify-content: space-between;
    }
    form .category label{
    display: flex;
    align-items: center;
    cursor: pointer;
    }
    form .category label .dot{
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
    }
    #dot-1:checked ~ .category label .one,
    #dot-2:checked ~ .category label .two,
    #dot-3:checked ~ .category label .three{
    background: #9b59b6;
    border-color: #d9d9d9;
    }
    form input[type="radio"]{
    display: none;
    }
 form .btn{
            display: block;
            width: 93%;
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
   form .btn:hover{
        background-position: right;
        color: black;
    }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
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
  .wave{
        position: fixed;
        bottom: 0;
        left: 0;
        height: 100%;
        z-index: -1;
    }

    .container-h{
        width: 100vw;
        height: 90vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap :0;
        padding: 0;
        background-color:#21618C;
    }

    .img{
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .img img{
        width: 500px;
    }

    form{
        width: 620px;
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

    @media(max-width: 584px){
    .container{
        max-width: 100%;
        width: 120vw;
        height: 100vh;
    }
    form .user-details .input-box{
        margin-bottom: 15px;
        width: 100%;
    }
    form .category{
        width: 100%;
    }
    .content form .user-details{
        max-height: 400px;
        overflow-y: scroll;
    }
    .user-details::-webkit-scrollbar{
        width: 5px;
    }
    }
    @media(max-width: 459px){
    .container .content .category{
        flex-direction: column;
    }
    }

    @media screen and (max-width: 1000px){
        .container{
            grid-gap: 5rem;
        }
        form{
            width: 350px;
        }
        .popupcontent{
        height: 500px;
        width: 200px;
    }

    @media screen and (max-width: 1000px){
        .login-content h2{
            font-size: 1.5rem;
            margin: 8px 0;
        }
        .img img{
            width: 400px;
        }
    }

    @media screen and (max-width: 900px){
        .container{
            grid-template-columns: 1fr;
            margin-top:0;

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

<x-app-layout>

<body>
        <img class="wave" src="images/wave.png">
	<div class="container-h">
		<div class="img">
			<img src="images/bg.png">
		</div>
        <div class="login-content">
        <div class="container">
    <br>
    <div class="title">Visitor Request Form</div>
    <div class="content">


    {{-- User Info --}}
        {{-- <div class="row">
            Name : {{ Auth::user()->fname }}
                    {{ Auth::user()->mname }}
                    {{ Auth::user()->lname }}
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
        </div> --}}
        

        <form method="POST" action="{{ route('visitorRequest.post') }}" enctype="multipart/form-data">
        @csrf
            <div class="mt-4">
                <x-jet-label for="nameOfVisitor" class="details" value="{{ __('Name of Visitor') }}" />
                <x-jet-input id="nameOfVisitor"  class="input-box" type="text" name="nameOfVisitor" :value="old('nameOfVisitor')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="dateOfVisit" class="details" value="{{ __('Date of Visit') }}" />
                <x-jet-input id="dateOfVisit"  class="input-box" type="date" name="dateOfVisit" required/>
            </div>

            <div class="mt-4">
                <x-jet-label for="purposeOfVisit" class="details" value="{{ __('Purpose of Visit') }}" />
                <x-jet-input id="purposeOfVisit"  class="input-box" type="text" name="purposeOfVisit" :value="old('purposeOfVisit')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="roomToVisit" class="details" value="{{ __('Room Number of Visit') }}" />
                <x-jet-input id="roomToVisit"  class="input-box" type="text" name="roomToVisit" :value="old('roomToVisit')" required />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="btn" id="generate" >
                    {{ __('Request Visitor') }}
                </x-jet-button>
            </div>
        </form>

		</div>

        @if(session()->has('visitorcreation'))
    
    <script>
        Swal.fire({
        icon: 'success',
        title: 'Visitor Created',
        showConfirmButton: false,
        timer: 1500
        })
    </script>
@endif
     
</x-app-layout>

