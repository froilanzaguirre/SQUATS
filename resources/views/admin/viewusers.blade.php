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
            {{-- Resident Account Creation --}}
            @if ($isOpen)
                @include('admin.createuseraccount')
            @endif
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

                    <div class="table-responsive mt-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Type</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Contact Number</th>
                                    <th>Room Number</th>
                                    <th>Vaccine Information</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->usertype }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->contactNumber }}</td>
                                        <td>{{ $user->roomToVisit }}</td>
                                        <td>
                                            <a href="/vaccineInfo/{{ $user->id }}" class="btn btncolor"><i
                                                    class="fa fa-eye"></i> View ID</a>
                                        </td>
                                        <td><a href="" class="btn btnadd">Edit User</a>
                                            <a href="" class="btn btndel">Delete User</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
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

@if (session()->has('created'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Account Created',
        })
    </script>
@endif


