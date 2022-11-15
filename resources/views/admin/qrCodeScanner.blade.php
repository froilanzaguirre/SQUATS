<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QR Code Scanner') }}
        </h2>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Admin Dashboard</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
                crossorigin="anonymous">
        </head>

        <body>
            <link rel="stylesheet" href="css\admin.css">

            <div class="container text-center">
                <div class="align-items-start">
                    @include('admin.sidebar')

                    {{-- start here --}}

                    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

                    @if (session()->has('scanned'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Welcome to Sta Philomina Residences',
                                html: 'Name: {{ $info->name }}<br>' +
                                    'User Type: {{ $info->usertype }}',
                            })
                        </script>
                    @endif

                    <style>
                        .row {
                            display: flex;
                        }
                    </style>

                    <div id="qr-reader" style="width: 600px"></div>


                    <div class="row">
                        <div class="col">
                            <div style="width:500px;" id="reader"></div>
                        </div>
                        <div class="col" style="padding:30px;">
                            <h4>SCAN RESULT</h4>
                            <div id="result">Result Here</div>
                        </div>
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
        </body>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>


    </x-slot>
</x-app-layout>
