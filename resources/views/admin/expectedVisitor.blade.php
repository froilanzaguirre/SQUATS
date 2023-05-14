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
      <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
          <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
              <div class="ps-lg-1">
                <div class="d-flex align-items-center justify-content-between">
                </div>
              </div>
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
             <h2 class="text-white text-xl fw-bold ml-4">LIST OF VISITORS</h2>
             <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="downloadlogpdf" class="btn btn-danger me-md-2" type="button">Download Records</a>
            </div>  
                <div class="table-responsive mt-1">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th class="text-danger fw-bold" style="font-size:1.1rem;">Date Of Visit</th>
                        <th class="text-danger fw-bold" style="font-size:1.1rem;">Status</th>
                        <th class="text-danger fw-bold" style="font-size:1.1rem;">Name Of Visitor</th>
                        <th class="text-danger fw-bold" style="font-size:1.1rem;">Room Owner</th>
                        <th class="text-danger fw-bold" style="font-size:1.1rem;">Room Number</th>
                        <th class="text-danger fw-bold" style="font-size:1.1rem;">Contact Number</th>
                        <th  class="text-danger fw-bold" style="font-size:1.1rem;">Gender</th>
                        <th  class="text-danger fw-bold" style="font-size:1.1rem;">Purpose Of Visit</th>
                        <th></th>
                      </tr>
                    </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        @foreach ($expectedVisitor as $index => $visitors)
                        <?php $total++; ?>
                          <tr>
                            <td class="text-white" style="font-size:1rem;">{{ $index + 1 }}</td>
                            <td class="text-white" style="font-size:1rem;">{{ $visitors->dateOfVisit }}</td>
                            <td class="text-white" style="font-size:1rem;">{{ $visitors->status }}</td>
                            <td class="text-white" style="font-size:1rem;">{{ $visitors->nameOfVisitor }}</td>
                            <td class="text-white" style="font-size:1rem;">{{ $visitors->nameToVisit }}</td>
                            <td class="text-white" style="font-size:1rem;">{{ $visitors->roomToVisit }}</td>
                            <td class="text-white" style="font-size:1rem;">{{ $visitors->contactNumber }}</td>
                            <td class="text-white" style="font-size:1rem;">{{ $visitors->gender }}</td>
                            <td class="text-white" style="font-size:1rem;">{{ $visitors->purposeOfVisit }}</td>
                            <td><a href="approvevisitor{{$visitors->id}}"><button class="btn btnadd text-white">Approve</button><a><td>
                            <td><a href="deleteVisitor{{$visitors->id}}"><button class="btn btnadd text-white">Delete</button><a><td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <label>Total: <?php echo $total; ?></label>
                    {{ $expectedVisitor->links() }}
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

  <!-- container-scroller -->
    <!-- plugins:js -->

    @include('admin.script')
  </body>
</html>