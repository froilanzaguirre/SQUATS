<x-app-layout>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('tablecss')
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
    max-width:100%;
    width:100%;
    }
    h3{
        margin-right:18rem;
        font-size:30px;
        font-weight:bold;
        color:white;
    }
    h4{
        margin-right:18rem;
        font-size:20px;
        color:white;
    }
    .container{
    max-width: 100%;
    width: 100%;
    height:50rem;
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
        margin-bottom:7rem;
        margin-left:10px;
        
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
        }
        .content{
            max-height: 500px;
            overflow-y: scroll;
        }
        .content::-webkit-scrollbar{
            width: 5px;
        }
    }
</style>

      
</head>
<body>
        <div class="container">
           
        <br>
        <div class="title">Approve Your Visitor</div>

        <div style="color:black">WARNING: Only Approve Visitors that you know for the security of the building and your own</div>

<br>
        <div class="content">

        <!-- ETO YUNG ILILIPAT PAG DEDESIGNAN -->
        
            <table id="docTable" class="table table-striped">
                <thead>
                    <tr>
                    <th></th>
                    <th>Date Of Visit</th>
                    <th>Status</th>
                    <th>Name Of Visitor</th>
                    <th>Room Owner</th>
                    <th>Room Number</th>
                    <th>Contact Number</th>
                    <th>gender</th>
                    <th>Purpose Of Visit</th>
                    <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach ($visitor as $index => $visitors)
                    <?php $total++; ?>
                        <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $visitors->dateOfVisit }}</td>
                        <td>{{ $visitors->status }}</td>
                        <td>{{ $visitors->nameOfVisitor }}</td>
                        <td>{{ $visitors->nameToVisit }}</td>
                        <td>{{ $visitors->roomToVisit }}</td>
                        <td>{{ $visitors->contactNumber }}</td>
                        <td>{{ $visitors->gender }}</td>
                        <td>{{ $visitors->purposeOfVisit }}</td>
                        <td><a href="approvevisitor{{$visitors->id}}"><button>Approve</button><a></td>
                        <td><a href="deleteVisitor{{$visitors->id}}"><button>Delete</button><a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $visitor->links() }}
        <!-- TABLE END -->
        
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
    </script>

</html>

</x-app-layout>
