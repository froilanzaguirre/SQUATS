<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix@1.2.0/dist/chartjs-chart-matrix.min.js"></script>
  <script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"
    integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
  

<div class="main-panel">
  <div class="content-wrapper bg-dark">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card corona-gradient-card">
          <div class="card-body py-0 px-0 px-sm-3">
            <div class="row align-items-center">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body ">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center h1 align-self-start">
                  <h1>
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
                                ?>
                    </span>
                  </h1>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h2 class="text-light h3 font-weight-normal">Total Residents</h2>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center h2 align-self-start">
                  <h2>
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
                                            ?>
                    </span>
                  </h2>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-light h3 font-weight-normal">Total Log Today</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center h2 align-self-start">
                  <h2>
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
                                            ?>
                    </span>
                  </h2>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-danger">
                  <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-light h3 font-weight-normal">Total Visitor Today</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center h2 align-self-start">
                  <h2>
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
                                            ?>
                    </span>
                  </h2>
                </div>
              </div>
              <div class="col-3">
                <div class="icon icon-box-success ">
                  <span class="mdi mdi-arrow-top-right icon-item"></span>
                </div>
              </div>
            </div>
            <h6 class="text-light h3 font-weight-normal">Total User Admin</h6>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Log Total</h4>
            <canvas id="transaction-history" class="transaction-chart"></canvas>
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1">Active Residents</h6>
                <p class="text-muted mb-0">13 April 2022, 09:12AM</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">99</h6>
              </div>
            </div>
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1">Active Visitors</h6>
                <p class="text-muted mb-0">07 April 2022, 09:12AM</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">80</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">

            {{-- Line Chart ng Weekly Report --}}

            <canvas id="linechart"></canvas>
            <script type="text/javascript">
              var data_x = JSON.parse('{!! json_encode($numberoflog) !!}');
              var data_y = JSON.parse('{!! json_encode($days) !!}');
            </script>

          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- scripts --}}
  <div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
      </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
      </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
      integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
      </script>
    <script src="{{ asset('assets/linechart.js') }}"></script>
  </div>

  <!-- recent logs table -->
  <div>
    <table class="table text-white">
      <thead>
        <tr>
          <th>User Type</th>
          <th>Name</th>
          <th>Time In</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($recentlogin as $recentlog)
        <tr>
          <td>{{ $recentlogin[$loop->index]->usertype }}</td>
          <td>{{ $recentlogin[$loop->index]->name }}</td>
          <td>{{ $recentlogin[$loop->index]->timein }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  <!-- curfew monitoring table -->
  <div>
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

  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

    </script>
  <!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>