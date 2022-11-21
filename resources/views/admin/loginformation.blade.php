<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  </head>
  <body>
    <div class="container-scroller bg-dark">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
               
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
             
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
     @include('admin.navbar')
        <!-- partial -->
        <div class="container">

             <div class="float-right">
             <br><br><br><br>

                    <a class="btn btncolor" href="downloadlogpdf">Download Records</a>

                    {{-- start here --}}

                    <div class="table-responsive mt-5">
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Type</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Purpose</th>
                                    <th>Room Owner</th>
                                    <th>Room Number</th>
                                    <th>Vaccine Information</th>
                                    <th>Date</th>
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
                                        <td>{{ $loginfo->purposeOfVisit }}</td>
                                        <td>{{ $loginfo->nameToVisit }}</td>
                                        <td>{{ $loginfo->roomToVisit }}</td>
                                        <td>
                                            <a href="/vaccineInfo/{{ $loginfo->userid }}" class="btn btncolor">
                                                <i class="fa fa-eye"></i> View ID</a>
                                        </td>
                                        <td>{{ $loginfo->dayin }}</td>
                                        <td>{{ $loginfo->timein }}</td>
                                        <td>{{ $loginfo->timeout }}</td>
                                        <td>
                                            <a href="/logout/{{ $loginfo->id }}" class="btn btncolor"><i
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

<!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
  </body>
</html>