<x-guest-layout>
@if(Auth::id())
@livewire('navigation-menu')
@endif
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.js" integrity="sha512-oa6kn7l/guSfv94d8YmJLcn/s3Km4mm/t4RqFqyorSMXkKlg6pFM6HmLXsJvOP/Cl/dv/N5xW7zuaA+paSc55Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.min.js" integrity="sha512-OxXHRCrHZMOqbrhaUX+wMD4pRxO+Ym5CKOf0qsPkBTeBOXBjAKirtaTH87wKgEikZBPOMQPOEqE/3fpWa1wiuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" integrity="sha512-sn/GHTj+FCxK5wam7k9w4gPPm6zss4Zwl/X9wgrvGMFbnedR8lTUSLdsolDRBRzsX6N+YgG6OWyvn9qaFVXH9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    
    .container-p .popup{
        height: 100px;
        width: 52%;
        margin-top: 20px;
        margin-bottom: 350px;
        margin-right: 100rem;
        position: absolute;
        display:none;
        z-index: 7;
    }
    .container-p .popup:after{
        height: 100px;
        width: 52%;
        margin-top: 50px;
        margin-bottom: 350px;
        margin-right:  50rem;
        position: block;
        display: none;
        z-index: 7;
    }
    .container-p .popup .popupcontent{
        height: 550px;
        width: 450px;
        background: white;
        padding:5px;
        margin: 30px;
        border-radius: 5px;
        position: absolute;
        border: 3px solid black;
    }
    .close-btn{
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 18px;
        cursor: pointer;
    }
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
    display: absolute;
    justify-content: center;
    align-items: center;
    overflow:hidden;
    }
    .container{
    max-width: 700px;
    width: 800px;
    height:100%;
    background-color: #fff;
    padding: 15px 40px;
    margin-right:13rem;
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
    }
    .user-details .input-box input{
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
    margin: 10px 0 ;
    justify-content: space-between;
    }
    form .category label{
    display: flex;
    cursor: pointer;
    margin-right:4rem;
    }
    form .term{
    margin-left:4rem;
    }
    form .category label .dot{
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-top:5px;
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
    form .term{
        margin-left:30rem;
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
        z-index: -3;
    }

    .container-h{
        width: 115vw;
        height: 100vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap :0rem;
        padding: 0;
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

    .login-content img{
        height: 100px;
    }


    @media(max-width: 1000px){
    .container{
        width: 900px;
        height: 100vh;
        overflow:hidden;
    }
    form .user-details .input-box{
        margin-bottom: 15px;
        width: 100%;
    }
    form .category{
        width: 100%;
    }
    .content form .user-details{
        max-height: 500px;
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
            overflow:hidden;
        }
        form{
            width: 350px;
        }
        .popupcontent{
        height: 500px;
        width: 200px;
        }
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
            overflow:hidden;

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

    svg{
        border-color: white;
        border-style: solid;
    }

 </style>

<body>

<img class="wave" src="images/wave.png">
	<div class="container-h">
		<div class="img">
			<img src="images/bg.png">
		</div>
        <div class="login-content">
         
        {{-- Popup --}}
    <div class="container-p">
        <div class="popup">
            <div class="popupcontent">
                
                <div class="py-12 max-w-7xl mx-auto sm:px-4 lg:px-3 ">
                
                <span id="close" onclick="this.parentNode.parentNode.remove(); return false;">
                <label class="close-btn fas fa-times" title="close"></label>
            </span>
                
                    <!-- QR Code -->
                    <div class="flex items-center justify-center mt-1">
                        <div id="capture" class="visible-print text-center">
                                {!! QrCode::size(330)->generate("http://127.0.0.1:8000/user" . $qrid); !!}
                               <h2> {{$qrname}}<br> </h2>
                               <h3> {{$qrusertype}} </h3>
                        </div>
                    </div>
                    
                    <!-- Buttons -->
                    <div class="flex items-center justify-center mt-1">
                        <x-jet-button class="mt-1" class="btn" onclick="downloadQR()" id="downloadQR">
                            {{ __('Download Digital ID') }}
                        </x-jet-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
    <br>
    <div class="title">Visitor Request</div>
    <div class="content">

    

 
    {{-- User Info --}}
    <!-- <h2 class="name">Visitor Request Form</h2>  -->

    <form method="POST" action="{{ route('visitorRequest.post') }}" enctype="multipart/form-data">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <div class="mt-2">
                <x-jet-label for="nameOfVisitor" class="details" value="{{ __('Full Name') }}" />
                <x-jet-input id="nameOfVisitor" class="input-box" type="text" name="nameOfVisitor" :value="old('nameOfVisitor')" required autofocus autocomplete="nameOfVisitor" />
            </div>
            </div>
        
          <div class="input-box">
            <div class="mt-2">
                <x-jet-label for="contactNumber" class="details" value="{{ __('Contact Number') }}" />
                <x-jet-input id="contactNumber" class="input-box" type="text" name="contactNumber" />
            </div>
            </div>
          <div class="input-box">
            <div class="mt-2">
                <x-jet-label for="dateOfVisit" value="{{ __('Date of Visit') }}" />
                <x-jet-input id="dateOfVisit" class="input-box" type="date" name="dateOfVisit" required/>
            </div>
            </div>
          <div class="input-box">
            <div class="mt-2">
                <x-jet-label for="purposeOfVisit" value="{{ __('Purpose of Visit') }}" />
                <x-jet-input id="purposeOfVisit" class="input-box" type="text" name="purposeOfVisit" :value="old('purposeOfVisit')" required />
            </div>
            </div>
          <div class="input-box">
            <div class="mt-2">
                <x-jet-label for="nameToVisit" value="{{ __('Resident Name') }}" />
                <x-jet-input id="nameToVisit" class="input-box" type="text" name="nameToVisit" :value="old('nameToVisit')" required />
            </div>
            </div>
          <div class="input-box">
            <div class="mt-2">
                <x-jet-label for="roomToVisit" value="{{ __('Room Number to Visit') }}" />
                <x-jet-input id="roomToVisit" class="input-box" type="text" name="roomToVisit" :value="old('roomToVisit')" required />
            </div>
            </div>
          <div class="input-box">
            {{-- Vaccination Dose --}}
            <x-jet-label for="vaccinedose" value="{{ __('Vaccine Dosage') }}" />
            <select name="vaccinedose" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="">Select Vaccination Dosage</option>
                <option value="Unvaccinated">Unvaccinated</option>
                <option value="First Dose">First Dose</option>
                <option value="Fully Vaccinated">Fully Vaccinated</option>
                <option value="Fully Vaccinated With Booster">Fully Vaccinated With Booster</option>
            </select>
            </div>

          
            <div class="gender-details">
          <input type="radio" name="gender" value="Male" id="dot-1">
          <input type="radio" name="gender" value="Female" id="dot-2">
          <x-jet-label for="gender" class="details" value="{{ __('Gender') }}" />
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label> &nbsp; 
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
        </div>      
        <div class="input-vax">
            <div class="mt-2">
                <x-jet-label for="vaccine" class="details" value="{{ __('Vaccination Card') }}" />
                <div class="mt-1">
                <x-jet-input id="vaccine" type="file" name="vaccine"/>
            </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <x-jet-label for="terms">
                        <div class="flex mt-4 float-left">
                            <x-jet-checkbox name="terms" id="terms" required/>
                                {!! __('&nbsp; I agree to the &nbsp; :data_privacy_policy', [
                                        'data_privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-success-800 hover:text-gray-900">'.__('Data Privacy Act').'</a>',
                                ]) !!}
                           
                        </div>
                    </x-jet-label>
            @endif
            </div>
          
            </div>
                  <x-jet-button class="btn" id="generate">
                  {{ __('Generate QR code') }}
                </x-jet-button>
            </form>
		 </div>
       </div>
      </div>
    </div> 
</body>  

    <!-- START DOWNLOADING QR CODE -->
        <div> <!-- FOR DOWNLOADING QR -->
            <script>
                function downloadQR(){
                    html2canvas(document.getElementById("capture")).then(function(canvas){
                        downloadImage(canvas.toDataURL(), "QRCode.png");
                    });
                }

                function downloadImage(uri, filename){
                    var link = document.createElement('a');
                    if(typeof link.download !== "string"){
                        window.open(uri);
                    }
                    else{
                        link.href = uri;
                        link.download = filename;
                        accountForFirefox(clickLink, link);
                    }
                }

                function clickLink(link){
                    link.click();
                }

                function accountForFirefox(click){
                    var link = arguments[1];
                    document.body.appendChild(link);
                    click(link);
                    document.body.removeChild(link);
                }
            </script>
        </div>
    <!-- END DOWNLOADING QR -->

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