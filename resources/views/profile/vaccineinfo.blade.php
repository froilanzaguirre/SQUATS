
Name: {{ $user->name }} <br>
Vaccination Information: {{ $user->vaccinedose }}<br>
<!-- QR Code -->
<div class="flex items-center justify-center mt-4">
    <div class="visible-print text-center">
            {!! QrCode::size(320)->generate("http://127.0.0.1:8000/user/" . $user->id); !!}
    </div>
</div>
<img src="C:\xampp\htdocs\security-system-squats-2\public\images\bg.png" alt="pic">
<div class="img">
    <img src="images/bg.png">
</div>

<div class="container">
<x-jet-label>

</div>