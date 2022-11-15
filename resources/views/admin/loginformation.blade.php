<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log Information') }}
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

                    <div class="table-responsive mt-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Type</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Date</th>
                                    <th>Purpose</th>
                                    <th>Room Owner</th>
                                    <th>Room Number</th>
                                    <th>Vaccine Information</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                    <th>Log Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loginformation as $loginfo)
                                    <tr>
                                        <th scope="row">{{ $loginfo->userid }}</th>
                                        <td>{{ $loginfo->usertype }}</td>
                                        <td>{{ $loginfo->name }}</td>
                                        <td>{{ $loginfo->gender }}</td>
                                        <td>{{ $loginfo->contactNumber }}</td>
                                        <td>{{ $loginfo->dateOfVisit }}</td>
                                        <td>{{ $loginfo->purposeOfVisit }}</td>
                                        <td>{{ $loginfo->nameToVisit }}</td>
                                        <td>{{ $loginfo->roomToVisit }}</td>
                                        <td>
                                            <a href="/vaccineInfo/{{ $loginfo->userid }}" class="btn"><i
                                                    class="fa fa-eye"></i> View ID</a>
                                        </td>
                                        <td>{{ $loginfo->created_at }}</td>
                                        <td>{{ $loginfo->timeout }}</td>
                                        <td>
                                            <a href="/logout/{{ $loginfo->id }}" class="btn"><i
                                                    class="fa fa-arrow-right"></i> Log Out</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $loginformation->links() }}
                    </div><br>

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
