<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SQUATS:Security System</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/squats-logo.png" />
        <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

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
    h2{
        margin-right:10px;
        font-size:30px;
        font-weight:bold;
        color:white;
    }
    h4{
        margin-right:10px;
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
        <div class="title">QR Code Scanner</div>
        <br>
        <div class="content">
      
                <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

                @if (session()->has('scanned'))
                <script>
                    let timerInterval
                         Swal.fire({
                            title: "<h2 style='color:black; font-size:2rem;margin-top:1px;font-weight:bold;'>" + 'Welcome to Sta Philomena Residences',
                            html: "<h4 style='color:black; font-size:1.2rem;font-weight:bold;margin-left:10rem;'>" + '{{ $info->name }}<br>' +
                             '{{ $info->usertype }}',
                            imageUrl: 'images/squats-logo.png',
                            imageWidth: 250,
                            imageHeight: 250,
                            imageAlt: 'squats-logo',
                            timer: 2500,
                            timerProgressBar: false,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                            })
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: "<h5 style='color:black'>" + 'Welcome to Sta Philomena Residences',
                    //     html: 'Name: {{ $info->name }}<br>' +
                    //         'User Type: {{ $info->usertype }}',
                    //     })
                </script>
                @endif

                <!-- Not Scanned -->
                @if (session()->has('notscanned'))
                <script>
                    let timerInterval
                        Swal.fire({
                            icon: 'error',
                            title: "<h2 style='color:black; font-size:2rem;margin-top:1px;font-weight:bold;'>" + 'Visitors Cannot Enter on Curfew Hours',
                            timer: 2500,
                            timerProgressBar: false,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                </script>
                @endif

                <!-- for time out -->
                @if ($isOpenNotScanned == 1)
                <script>
                    let timerInterval
                         Swal.fire({
                            title: "<h2 style='color:black; font-size:2rem;margin-top:1px;font-weight:bold;'>" + 'Visitor Is Not Approved Yet',
                            html: "<h4 style='color:black; font-size:1.3rem;font-weight:bold;'>" + '' +
                             '',
                            imageUrl: 'images/squats-logo.png',
                            imageWidth: 250,
                            imageHeight: 250,
                            imageAlt: 'squats-logo',
                            timer: 2500,
                            timerProgressBar: false,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                </script>
                @endif
                
                <!-- for not approved -->
                @if ($isOpenTimeout == 1)
                <script>
                    let timerInterval
                         Swal.fire({
                            title: "<h2 style='color:black; font-size:2rem;margin-top:1px;font-weight:bold;'>" + 'Timed Out',
                            html: "<h4 style='color:black; font-size:1.3rem;font-weight:bold;'>" + '{{ $loginformation->name }}<br>' +
                             '{{ $loginformation->usertype }}',
                            imageUrl: 'images/squats-logo.png',
                            imageWidth: 250,
                            imageHeight: 250,
                            imageAlt: 'squats-logo',
                            timer: 2500,
                            timerProgressBar: false,
                            didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                                }, 100)
                            },
                            willClose: () => {
                                clearInterval(timerInterval)
                            }
                            }).then((result) => {
                            /* Read more about handling dismissals below */
                            if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                            }
                        })
                </script>
                @endif

                <style>
                    .row {
                        display: flex;
                    }
                    .reader{
                        background-color:white;
                        color:black;
                    }
                  
                </style>

                <div id="qr-reader" style="width:600px"></div>

                <div class="row">
                    <div class="col">
                        <div style="width:400px;" id="reader"></div>
                    </div>
                        <div style="display: none;" id="result"></div>
                </div>

                <script type="text/javascript">
                    function onScanSuccess(qrCodeMessage) {
                        document.getElementById('result').innerHTML = '<span class="result">' + qrCodeMessage + '</span>';
                        window.location.replace(qrCodeMessage);
                    }

                    function onScanError(errorMessage) {
                        //handle scan error
                    }

                    var html5QrcodeScanner = new Html5QrcodeScanner(
                        "reader", {
                        fps: 10,
                        qrbox: 250
                    });
                    html5QrcodeScanner.render(onScanSuccess, onScanError);
                </script>

                {{-- stop here --}}
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

<!-- container-scroller -->
<!-- plugins:js -->

@include('admin.script')
</body>

</html>

</x-app-layout>

  
