<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('QR Code Scanner') }}
        </h2>
        
        <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

        @if(session()->has('scanned'))
            <script>
                Swal.fire({
                icon: 'success',
                title: 'Welcome to Sta Philomina Residences',
                html:
                    '{{$info->name, $info->purposeOfVisit}}',
                })
            </script>
        @endif

        <style>
        
            .row{
            display:flex;
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
                document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
                window.location.replace(qrCodeMessage);
            }

            function onScanError(errorMessage) {
                //handle scan error
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess, onScanError);

        </script>


    </x-slot>
</x-app-layout>
