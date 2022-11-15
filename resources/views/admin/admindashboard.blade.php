<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <body>
            <link rel="stylesheet" href="css\admin.css">

            <div class="container text-center">
                <div class="align-items-start">
                    @include('admin.sidebar')

                    {{-- start here --}}

                    <div class="col">

                        <div class="card-body color1">
                            <div class="float-left">
                                <h1>Total Resident</h1>
                                <h3>
                                    <span class="count">
                                        <?php
                                        $servername = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $dbname = 'security_system';
                                        $con = mysqli_connect($servername, $username, $password, $dbname);

                                        $sql = 'SELECT count(usertype) AS total FROM users WHERE usertype = "Resident"';
                                        $result = mysqli_query($con, $sql);
                                        $values = mysqli_fetch_assoc($result);
                                        $num_rows = $values['total'];

                                        echo $num_rows;
                                        ?></span>
                                </h3>
                            </div>
                            <div class="float-right">
                                <i class="pe-7s-display2"></i>
                            </div>
                        </div>

                        <div class="card-body color2">
                            <div class="float-left">
                                <h1>Total Log Today</h1>
                                <h3>
                                    <span class="count">
                                        <?php
                                        $servername = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $dbname = 'security_system';
                                        $con = mysqli_connect($servername, $username, $password, $dbname);

                                        $sql = 'SELECT count(*) AS total FROM `log_information`';
                                        $result = mysqli_query($con, $sql);
                                        $values = mysqli_fetch_assoc($result);
                                        $num_rows = $values['total'];

                                        echo $num_rows;
                                        ?></span>
                                </h3>
                            </div>
                            <div class="float-right">
                                <i class="pe-7s-display2"></i>
                            </div>
                        </div>

                        <div class="card-body color3">
                            <div class="float-left">
                                <h1>Total Admin</h1>
                                <h3>
                                    <span class="count">
                                        <?php
                                        $servername = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $dbname = 'security_system';
                                        $con = mysqli_connect($servername, $username, $password, $dbname);

                                        $sql = 'SELECT count(usertype) AS total FROM users WHERE usertype = "Admin"';
                                        $result = mysqli_query($con, $sql);
                                        $values = mysqli_fetch_assoc($result);
                                        $num_rows = $values['total'];

                                        echo $num_rows;
                                        ?></span>
                                </h3>
                            </div>
                            <div class="float-right">
                                <i class="pe-7s-display2"></i>
                            </div>
                        </div>

                        <div class="card-body color4">
                            <div class="float-left">
                                <h1>Total Visitor Today</h1>
                                <h3>
                                    <span class="count">
                                        <?php
                                        $servername = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $dbname = 'security_system';
                                        $con = mysqli_connect($servername, $username, $password, $dbname);

                                        $sql = 'SELECT count(*) AS total FROM log_information WHERE usertype = "Visitor"';
                                        $result = mysqli_query($con, $sql);
                                        $values = mysqli_fetch_assoc($result);
                                        $num_rows = $values['total'];

                                        echo $num_rows;
                                        ?></span>
                                </h3>
                            </div>
                            <div class="float-right">
                                <i class="pe-7s-display2"></i>
                            </div>
                        </div>
                    </div>

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



        {{-- Resident Account Creation --}}
        <a href="openAccountCreator">Create Account For Resident</a>
        @if ($isOpen)
            @include('admin.createuseraccount')
        @endif


    </x-slot>
</x-app-layout>

@if (session()->has('created'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Account Created',
        })
    </script>
@endif
