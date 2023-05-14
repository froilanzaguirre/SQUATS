<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SQUATS:Security System</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.js" integrity="sha512-oa6kn7l/guSfv94d8YmJLcn/s3Km4mm/t4RqFqyorSMXkKlg6pFM6HmLXsJvOP/Cl/dv/N5xW7zuaA+paSc55Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.min.js" integrity="sha512-OxXHRCrHZMOqbrhaUX+wMD4pRxO+Ym5CKOf0qsPkBTeBOXBjAKirtaTH87wKgEikZBPOMQPOEqE/3fpWa1wiuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" integrity="sha512-sn/GHTj+FCxK5wam7k9w4gPPm6zss4Zwl/X9wgrvGMFbnedR8lTUSLdsolDRBRzsX6N+YgG6OWyvn9qaFVXH9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>


</head>
<body>
    <div class="container">
        <div id="capture">
            <div class="padding">
                <div class="font" >
                    <div class="top">
                        <div class="barcode">
                            <div class="visible-print text-center">
                                {!! QrCode::size(200)->generate("https://staphilomenaresidence.com/user" . $user->id); !!}
                            </div>
                        </div>
                    </div>
                    <div class="bottom">
                        <p>{{$user->name}}</p>
                        <p class="desi mt-1">{{$user->usertype}} <br>
                        {{$user->vaccinedose}}</p>
                      <br><br>
                        <h5 class="ml-4 mt-1 card-title"> &nbsp; Vaccine Card</h5>
                        &nbsp; <img class="justify-content-center" src="{{$user->vaccine}}" width="340px" height="220px" alt="No Vaccination Card">
                      <br>
                        <a class="btn btncolor" onclick="downloadQR()">Download ID</a>
                    </div>
                </div>
                

            </div>
            
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    </body>
</html>


<style>
    *{
    margin: 00px;
    padding: 00px;
    box-sizing: content-box;
    }

    .container {
        height: 800px;
        width: 200rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: white;
        flex-direction: row;
        flex-flow: wrap;
        overflow:hidden;

    }

    .font{
        height: 650px;
        width: 360px;
        position: relative;
        border-radius: 10px;
        margin-left:20px;
        border-style: solid;
    }

    .top{
        height: 30%;
        width: 100%;
        background-color: #21618C;
        position: relative;
        z-index: 5;
        
    }

    .bottom{
        height: 70%;
        width: 100%;
        background-color: white;
        position: absolute;
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .top img{
        height: 100px;
        width: 100px;
        background-color: #e6ebe0;
        border-radius: 10px;
        position: absolute;
        top:40px;
        left: 75px;
    }
    .bottom p{
        position: relative;
        top: 60px;
        text-align: center;
        text-transform: capitalize;
        font-weight: bold;
        font-size: 20px;
    }
    .bottom .desi{
        font-size:12px;
        color: grey;
        font-weight: normal;
        top: 45px;
        bottom:1px;
    }
    .bottom .desi{
        font-size: 15px;
        font-weight: normal;
    }
    .barcode img
    {
        height: 65px;
        width: 65px;
        text-align: center;
        margin: 5px;
    }
    .barcode{
        text-align: center;
        position: relative;
        top: 40px;
    }

    .back
    {
        height: 375px;
        width: 250px;
        border-radius: 10px;
        background-color: #8338ec;

    }
    .qr img{
        height: 80px;
        width: 100%;
        margin: 20px;
        background-color: white;
    }
    .Details {
        color: white;
        text-align: center;
        padding: 10px;
        font-size: 25px;
    }


    .details-info{
        color: white;
        text-align: left;
        padding: 5px;
        line-height: 20px;
        font-size: 16px;
        text-align: center;
        margin-top: 20px;
        line-height: 22px;
    }

    .logo {
        height: 40px;
        width: 150px;
        padding: 40px;
    }

    .logo img{
        height: 100%;
        width: 100%;
        color: white ;

    }
    .padding{
        padding-right: 20px;
    }

    @media screen and (max-width:100px)
    {
        .container{
            height: 130vh;
        }
        .container .front{
            margin-top: 50px;
        }
    }
        .btn {
            -webkit-border-radius: 5;
            -moz-border-radius: 5;
            border-radius: 5px;
            -webkit-box-shadow: 0px 1px 3px #666666;
            -moz-box-shadow: 0px 1px 3px #666666;
            box-shadow: 0px 1px 3px #666666;
            color: #ffffff;
            font-size: 13px;
            margin-left:130px;
            margin-top:5px;
            text-decoration: none;
        }

        .btncolor {
            color: white;
            background: #2b5a7a;
            background-image: -webkit-linear-gradient(top, #2b5a7a, #3d6682);
            background-image: -moz-linear-gradient(top, #2b5a7a, #3d6682);
            background-image: -ms-linear-gradient(top, #2b5a7a, #3d6682);
            background-image: -o-linear-gradient(top, #2b5a7a, #3d6682);
            background-image: linear-gradient(to bottom, #2b5a7a, #3d6682);
        }

        .btn:hover {
            color: white;
            background: #3d6682;
            background-image: -webkit-linear-gradient(top, #3d6682, #2b5a7a);
            background-image: -moz-linear-gradient(top, #3d6682, #2b5a7a);
            background-image: -ms-linear-gradient(top, #3d6682, #2b5a7a);
            background-image: -o-linear-gradient(top, #3d6682, #2b5a7a);
            background-image: linear-gradient(to bottom, #3d6682, #2b5a7a);
            text-decoration: none;
        }

        svg{
            border-color: white;
            border-style: solid;
        }
</style>



