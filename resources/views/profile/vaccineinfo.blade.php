<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Vaccine Info</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <div class="d-flex container justify-content-center ">
        <div class="card" style="width: 400px;">
            <div class="card-body">
                <h3 class="card-title">{{$user->name}}</h3>
                <h5 class="card-subtitle mb-2 text-muted">{{$user->usertype}}</h5>
                <h5 class="ml-3 mt-1 card-title">QR Code</h5>
                <div class="visible-print text-center">
                    {!! QrCode::size(300)->generate("http://127.0.0.1:8000/user/" . $user->id); !!}
                </div>
                <h5 class="ml-3 mt-3 card-title">Vaccine Card</h5>
                {{$user->vaccine}}
                <img class="justify-content-center" src="{{$user->vaccine}}" width="300px" alt="No Vaccination Card">
            </div>
        </div></div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    </body>
</html>
