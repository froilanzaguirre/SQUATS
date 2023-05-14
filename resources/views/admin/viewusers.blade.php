<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
       .btn-download{
            display: block;
            width: 200px;
            height: 40px;
            background-color:#21618C;
            font-size: 0.9rem;
            padding-top: 9px;
            padding-left:17px;
            padding-bottom: 15px;
            color: white;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin-left: 55rem;
            cursor: pointer;
            transition: .5s;
            border-radius: 5px;
            border:none;
    }
    .btn-download:hover{
        background-position: right;
        color: black;
    }

    </style>
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
            @if ($isOpenEdit)
                @include('admin.edituseraccount')
            @endif

            <div class="d-flex align-items-center justify-content-between">
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
            <h2 class="text-white fw-bold text-xl ml-4">LIST OF RESIDENTS</h2>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="downloadresidents" class="btn btn-danger me-md-2" type="button">Download Records</a>
            </div>  
            
                <div class="table-responsive mt-1">

                <!-- Search Start -->
                <form type="get" action="{{ route('residentsearch') }}" enctype="multipart/form-data">
                    <input name="search" type="text"
                    class="appearance-none border-green-200 rounded py-2 px-3 leading-tight text-black focus:outline-none focus:shadow-outline"
                    id="search" placeholder="Search">
                    <button type="submit" class="btn btncolor">Search</button>
                </form>
                <!-- Search End -->

                <table class="table mt-3 text-white">
                    <thead>
                         <tr>
                            <th></th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Name</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Email</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Gender</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Contact Number</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Room Number</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Vaccine Information</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        @foreach ($users as $index => $user)
                        <?php $total++; ?>
                        <tr>
                            <td style="font-size:1rem;">{{ $index + 1 }}</td>
                            <td style="font-size:1rem;">{{ $user->name }}</td>
                            <td style="font-size:1rem;">{{ $user->email }}</td>
                            <td style="font-size:1rem;">{{ $user->gender }}</td>
                            <td style="font-size:1rem;">{{ $user->contactNumber }}</td>
                            <td style="font-size:1rem;">{{ $user->roomToVisit }}</td>
                            <td style="font-size:1rem;"><a href="/vaccineInfo/{{ $user->id }}" class="btn btncolor">
                                <i class="fa fa-eye"></i> View ID</a></td>
                            <td style="font-size:1rem;"><a href="openAccountEditor{{$user->id}}" class="btn btnadd">Edit Resident</a>
                                <a href="todeleteuser{{$user->id}}" class="btn btndel">Delete Resident</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <label>Total: <?php echo $total; ?></label>
                    {{ $users->links() }}
                </div><br>

                <br><br>
                <h2 class="text-white text-xl fw-bold ml-4">LIST OF STAFF</h2>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="downloadresidents" class="btn btn-danger me-md-2" type="button">Download Records</a>
                </div> 

                <!-- Search Start -->
                <form type="get" action="{{ route('residentsearch') }}" enctype="multipart/form-data">
                    <input name="searchstaff" type="text"
                    class="appearance-none border-green-200 rounded py-2 px-3 leading-tight text-black focus:outline-none focus:shadow-outline"
                    id="searchstaff" placeholder="Search">
                    <button type="submit" class="btn btncolor">Search</button>
                </form>
                <!-- Search End -->

                <table class="table text-white">
                    <thead>
                         <tr>
                            <th></th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Name</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Email</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Gender</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Contact Number</th>
                            <th class="text-danger fw-bold" style="font-size:1.1rem;">Vaccine Information</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        @foreach ($staffs as $index => $staff)
                        <?php $total++; ?>
                        <tr>
                            <td style="font-size:1rem;">{{ $index + 1 }}</td>
                            <td style="font-size:1rem;">{{ $staff->name }}</td>
                            <td style="font-size:1rem;">{{ $staff->email }}</td>
                            <td style="font-size:1rem;">{{ $staff->gender }}</td>
                            <td style="font-size:1rem;">{{ $staff->contactNumber }}</td>
                            <td style="font-size:1rem;"><a href="/vaccineInfo/{{ $staff->id }}" class="btn btncolor">
                                <i class="fa fa-eye"></i> View ID</a></td>
                            <td style="font-size:1rem;"><a href="openAccountEditor{{$staff->id}}" class="btn btnadd">Edit Staff</a>
                                <a href="todeleteuser{{$staff->id}}" class="btn btndel">Delete Staff</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                    <label>Total: <?php echo $total; ?></label>
                    {{ $staffs->links() }}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

@if ($isOpenDelete == 1)
    <script>
        Swal.fire({
            title: '<strong class="text-dark">Are you sure you want to delete this User?<br>{{ $usertodelete->name }}<br>{{ $usertodelete->usertype }}</strong>',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            showConfirmButton: false,
            denyButtonText: `Delete User`,
            }).then((result) => {
            if (result.isDenied) {
                window.location.href = `deleteuser{{$usertodelete->id}}`
            } else {
                window.location.href = `viewusers`
            }
        });
    </script>
@endif

@if (session()->has('created'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "<h5 style='color:black'>" + 'Account Created',
        })
    </script>
@endif

@if (session()->has('edited'))
    <script>
        Swal.fire({
            icon: 'success',
            title: "<h5 style='color:black'>" + 'User Updated',
        })
    </script>
@endif

@if (session()->has('deleted'))
    <script>
        Swal.fire('<strong class="text-dark">User Deleted!<strong>', '', 'success');
    </script>
@endif

