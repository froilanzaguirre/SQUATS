<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  </head>
  <body>
    <div class="container-scroller">
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

                    <div class="table-responsive mt-5 p-5">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Room Owner</th>
                                    <th>Room Number</th>
                                    <th>Name Of Visitor</th>
                                    <th>Date Of Visit</th>
                                    <th>Purpose Of Visit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expectedVisitor as $visitors)
                                    <tr>
                                        <th scope="row">{{ $visitors->id }}</th>
                                        <td>{{ $visitors->nameOfOwner }}</td>
                                        <td>{{ $visitors->roomToVisit }}</td>
                                        <td>{{ $visitors->nameOfVisitor }}</td>
                                        <td>{{ $visitors->dateOfVisit }}</td>
                                        <td>{{ $visitors->purposeOfVisit }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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