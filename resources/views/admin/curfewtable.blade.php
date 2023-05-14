<!DOCTYPE html>

<html lang="en">



<head>

    <!-- Required meta tags -->



    @include('admin.css')



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</head>



<body>

    <div class="container-scroller">

        <!-- partial:partials/_sidebar.html -->



        @include('admin.sidebar')

        <!-- partial -->



        @include('admin.navbar')



        <!-- curfew monitoring table -->

         
             

        <div class="main-panel">
        

            <div class="content-wrapper bg-dark">

                <div class="row">
                <h2 class="text-white fw-bold text-xl ml-2 mb-3">Visitor Monitoring Maintenance Curfew Hours</h2>
                    <table class="table text-white">

                        <thead>

                            <tr>

                                <th>User Type</th>

                                <th>Name</th>

                                <th>Room Number</th>

                                <th>Room Owner</th>

                                <th>Time In</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach ($curfewcheck as $curfew)

                            <tr>

                                <td>{{ $curfewcheck[$loop->index]->usertype }}</td>

                                <td>{{ $curfewcheck[$loop->index]->name }}</td>

                                <td>{{ $curfewcheck[$loop->index]->roomToVisit }}</td>

                                <td>{{ $curfewcheck[$loop->index]->nameToVisit }}</td>

                                <td>{{ $curfewcheck[$loop->index]->timein }}</td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>





        @include('admin.script')

        <!-- End custom js for this page -->



</body>



</html>