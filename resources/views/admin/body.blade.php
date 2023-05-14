<head>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix@1.2.0/dist/chartjs-chart-matrix.min.js"></script>
  <script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.js" integrity="sha512-oa6kn7l/guSfv94d8YmJLcn/s3Km4mm/t4RqFqyorSMXkKlg6pFM6HmLXsJvOP/Cl/dv/N5xW7zuaA+paSc55Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.esm.min.js" integrity="sha512-OxXHRCrHZMOqbrhaUX+wMD4pRxO+Ym5CKOf0qsPkBTeBOXBjAKirtaTH87wKgEikZBPOMQPOEqE/3fpWa1wiuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.js" integrity="sha512-sn/GHTj+FCxK5wam7k9w4gPPm6zss4Zwl/X9wgrvGMFbnedR8lTUSLdsolDRBRzsX6N+YgG6OWyvn9qaFVXH9w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js"
    integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
  
<div class="main-panel">
  <div class="content-wrapper" style="background-color:#f2ebeb">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body py-0 px-0 px-sm-3">
            <div class="row align-items-center">
            <h1 class="text-color-success text-xl align-center" style="font-size:1.6rem;"> {{$timeanddate}} </h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-xl-4 grid-margin stretch-card" >
        <div class="card">
          <div class="card-body" >
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center h1 align-self-start" >
                  <h1>
                  <span class="count">
                      {{$numberoflogcardtoday}}
                    </span>
                  </h1>
                </div>
              </div>
              <div class="col-3">
              </div>
            </div>
            <br>
            <h2 class="text-light h3 font-weight-normal">Total Number of Time In</h2>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center h2 align-self-start">
                  <h2>
                  <span class="count">
                      {{$numberoflogcardvisitor}}
                    </span>
                  </h2>
                </div>
              </div>
              <div class="col-3">
              </div>
            </div>
            <br>
            <h6 class="text-light h3 font-weight-normal">Total Number of Visitors</h6>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-xl-4 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-9">
                <div class="d-flex align-items-center h2 align-self-start">
                  <h2>
                    <span class="count">
                      {{$mostvisitedresident->total}}
                    </span>
                  </h2>
                 
                 
                </div>
              </div>
              <div class="col-3">
                <br>
              </div>
              <h1 class="text-light text-xl text-danger"> {{$mostvisitedresident->nameToVisit}}</h1>
            </div>
            
            <h6 class="text-light h3 font-weight-normal">Most Visited Resident</h6>
          </div>
        </div>
      </div>
      
    <div class="row">
      <div id="capture" class="col-md-5 grid-margin px-8 h-auto stretch-card" style="height:37rem">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title fw-bold ">LOG ANALYSIS</h2>
              <canvas id="donutchart"></canvas>
                <script type="text/javascript">
                  var numofvisitors = JSON.parse('{!! json_encode($visitors) !!}');
                  var numofresidents = JSON.parse('{!! json_encode($residents) !!}');
                  var numofstaffs = JSON.parse('{!! json_encode($staffs) !!}');
                </script>
            <!-- <canvas id="transaction-history" class="transaction-chart"></canvas> -->
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1 text-md">Number of Residents</h6>
                <p class="text-muted mb-0">{{$timenow}}</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">{{$residents}}</h6>
              </div>
            </div>
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1 text-md">Number of Visitors</h6>
                <p class="text-muted mb-0">{{$timenow}}</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">{{$visitors}}</h6>
              </div>
            </div>
            <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
              <div class="text-md-center text-xl-left">
                <h6 class="mb-1 text-md">Number of Staffs</h6>
                <p class="text-muted mb-0">{{$timenow}}</p>
              </div>
              <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                <h6 class="font-weight-bold mb-0">{{$staffs}}</h6>
              </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a onclick="downloadQR()" class="btn btn-danger me-md-2">Download Log Analysis</a>
            </div>  
          </div>
        </div>
      </div>
      
      <div class="col-md-6 grid-margin stretch card h-auto" style="width:36rem;">
        <div class="card">
          <div class="card-body">
          <h2 class="card-title fw-bold float-center">RECENT TIME IN</h2>
          <table class="table text-white">
      <thead>
        <tr>
          <th class="text-info fw-bold" style="font-size:1.2rem;">User Type</th>
          <th class="text-info fw-bold" style="font-size:1.2rem;">Name</th>
          <th class="text-info fw-bold" style="font-size:1.2rem;">Time In</th>
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
        </div>
        <br>
  <div class="col-md-8 grid-margin py-1 w-auto h-auto">
        <div class="card">
          <div class="card-body">
          <h2 class="card-title fw-bold justify-content-center">RECENT TIME OUT</h2>
  
  <!-- recentlogout -->
    <table class="table text-white text-md">
      <thead>
        <tr>
          <th class="text-danger fw-bold" style="font-size:1.2rem;">User Type</th>
          <th class="text-danger fw-bold" style="font-size:1.2rem;">Name</th>
          <th class="text-danger fw-bold" style="font-size:1.2rem;">Time Out</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($recentlogout as $recentlog)
        <tr>
          <td>{{ $recentlogout[$loop->index]->usertype }}</td>
          <td>{{ $recentlogout[$loop->index]->name }}</td>
          <td>{{ $recentlogout[$loop->index]->timeout }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row bg-light">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-xl fw-bold">WEEKLY LOG</h4>
              
                    {{-- Line Chart of Weekly Report --}}
              <canvas id="linechart"></canvas>
              <script type="text/javascript">
                var data_x = JSON.parse('{!! json_encode($numberoflogvisitor) !!}');
                var data_x2 = JSON.parse('{!! json_encode($numberoflogresident) !!}');
                var data_x3 = JSON.parse('{!! json_encode($numberoflogstaff) !!}');
                var data_x4 = JSON.parse('{!! json_encode($numberoflogtotal) !!}');
                var data_y = JSON.parse('{!! json_encode($daysfortable) !!}');
                var data_y2 = JSON.parse('{!! json_encode($daysfortable) !!}');
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
    <script src="{{ asset('assets/donutchart.js') }}"></script>
  </div>

  
  
  <!-- recent logs table -->
  <!-- recent login -->
  <div>
   
  </div>
</body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>

  <!-- START DOWNLOADING QR CODE -->
  <div> <!-- FOR DOWNLOADING QR -->
        <script>
            function downloadQR(){
                html2canvas(document.getElementById("capture")).then(function(canvas){
                    downloadImage(canvas.toDataURL(), "LogAnalysis.png");
                });
            }

            function downloadImage(uri, filename){
                var link = document.createElement('a');
                if(typeof link.download !== "string"){
                    window.open(uri);
                }
                else{
                    link.href = uri;
                    link.download = filename;
                    accountForFirefox(clickLink, link);
                }
            }

            function clickLink(link){
                link.click();
            }

            function accountForFirefox(click){
                var link = arguments[1];
                document.body.appendChild(link);
                click(link);
                document.body.removeChild(link);
            }
        </script>
    </div>
<!-- END DOWNLOADING QR -->