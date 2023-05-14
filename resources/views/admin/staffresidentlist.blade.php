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
    display: block;
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
        font-size: 1rem;
        margin-bottom:1rem;
        margin:5px;
        color: black;
        font-family: 'Poppins', sans-serif;
        text-transform: uppercase;
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
        <div class="title">Resident List</div>
        <br>
        <form type="get" action="{{ route('staffresidentsearch') }}" enctype="multipart/form-data">
                    <input name="search" type="text"
                    class="appearance-none border-green-200 rounded w-auto py-2 px-3 leading-tight text-black focus:outline-none focus:shadow-outline"
                    id="search" placeholder="Search">
                    <button type="submit" class="btn btncolor">Search</button>
                </form>
                <!-- Search End -->
     
            <!-- Search Start -->
            <br>
                <table id="docTable" class="table table-striped">
                    <thead>
                         <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Contact Number</th>
                            <th>Room Number</th>
                            <th>Vaccine Information</th>
                          
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->contactNumber }}</td>
                            <td>{{ $user->roomToVisit }}</td>
                            <td><a href="/vaccineInfo/{{ $user->id }}" class="btn btncolor">
                                <i class="fa fa-eye"></i> View ID</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    {{ $users->links() }}
                
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