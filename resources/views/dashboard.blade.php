<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SQUATS:Security System</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/squats-logo.png" />
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
    h3{
        margin-right:18rem;
        font-size:24px;
        font-weight:bold;
        color:white;
    }
    h4{
        margin-right:18rem;
        font-size:20px;
        color:white;
    }
    .container{
    max-width: 700px;
    width: 100%;
    height:100%;
    background-color:#21618C;
    padding: 10px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }
    .container .title{
    font-size: 25px;
    font-weight: 500;
    position: relative;
    color:white;
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
    .wave{
        position: fixed;
        bottom: 0;
        left: 0;
        height: 100%;
        z-index: -1;
    }
    .content{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        text-align: center;
        margin-bottom:7rem;
        margin-left:7rem;
    }
    .container-h{
        width: 100vw;
        height: 90vh;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap :0;
        padding: 0;
        background-color:white;
    }

    .img{
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .btn{
            display: block;
            width: 260px;
            height: 40px;
            background-color:white;
            background-size: 200%;
            font-size: 1.2rem;
            padding-top: 7px;
            padding-bottom: 15px;
            color: black;
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
            width: 290px;
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
    @media screen and (max-width: 950px){
        .container{
            grid-gap: 10rem;
            overflow:hidden;
        }
    }

    @media screen and (max-width: 1050px){
        .container{
            grid-template-columns: 2fr;
            margin-bottom:10rem;
            overflow:hidden;
        }

        .img{
            display: none;
        }

        .wave{
            display: none;
        }

        .content{
            justify-content: center;
            margin-right:7rem;
        }
    }

    .border-white{
        border-color: white;
        border-style: solid;
    }

    #capture{
        display: none;
    }
</style>

      
</head>
<body>
    <img class="wave" src="images/wave.png">
        <div class="container-h">
            <div class="img">
                <img src="images/bg.png">
            </div>
            <div class="login-content">
            <div class="container">
        <br>
        <div class="title">QR Code Information</div>
        <br>
        <div class="content">
                    <!-- User info -->
                        <div class="ml-4 justify-content-center "style="margin-left: 60px;">
                            <div class="card-body">
                                <div class="card" style="width: 600px;">
                                    <div class="visible-print text-center mb-4">
                                        <div class="border-white">
                                        {!! QrCode::size(290)->generate("http://127.0.0.1:8000/user" . $user->id); !!}
                                        </div>
                                    </div>

                                    <h3>{{$user->name}}</h3>
                                    <h4>{{$user->usertype}}</h4>
                                    <a class="btn btncolor text-center" onclick="downloadQR()">Download QR</a>
                                </div>
                            </div>
                        </div>
                    <!-- QR CODE TO BE DOWNLOADED -->
                    <div id="capture">
                        {!! QrCode::size(400)->generate("http://127.0.0.1:8000/user" . $user->id); !!}
                        <h2>{{$user->name}}</h2>
                        <h2>{{$user->usertype}}</h2>
                    </div>
                    <!-- End User Info -->
                </div>
            </div>
        </div>

        <!-- START DOWNLOADING QR CODE -->
        <div> <!-- FOR DOWNLOADING QR -->
            <script>
                function downloadQR(){
                    document.getElementById("capture").style.display="block";
                    html2canvas(document.getElementById("capture")).then(function(canvas){
                        downloadImage(canvas.toDataURL(), "QRCode.png");
                    });
                    document.getElementById("capture").style.display="none";
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

</html>

</x-app-layout>
