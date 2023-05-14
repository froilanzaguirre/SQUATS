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
    .btn-logs{
            display: block;
            width: 225px;
            height: 40px;
            background-color:#b81d1d;
            font-size: 0.9rem;
            padding-top: 9px;
            padding-left:17px;
            padding-bottom: 15px;
            color: white;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin-left: 53.5rem;
            cursor: pointer;
            transition: .5s;
            border-radius: 5px;
            border:none;
    }
    .btn-logs:hover{
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
            <br><br><br><br>
            <h2 class="text-white fw-bold text-xl ml-4">INCIDENT LOGS</h2>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="downloadlogpdf{{$search}}" class="btn btn-danger me-md-2" type="button">Download Records</a>
                  <a a href="showalllogs" class="btn btn-primary me-md-2" type="button">Show All Incident Logs</a>
            </div>  
                {{-- start here --}}

                <br>
             
                <form type="get" action="{{ route('search') }}" enctype="multipart/form-data">
                  <input name="search" type="text"
                  class="appearance-none border-green-200 rounded py-2 px-3 leading-tight text-black focus:outline-none focus:shadow-outline"
                  id="search" placeholder="Filter">
                  <button type="submit" class="btn btncolor">Filter</button>
                
                </form>

                  <div class="table-responsive mt-2">
                    <table id="dataTable" class="table" >
                      <thead>
                        <tr>
                          <th></th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Date</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">User Type</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Name</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Contact Number</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Purpose</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Room Owner</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Room Number</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Vaccine Information</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Time In</th>
                          <th class="text-danger fw-bold" style="font-size:1.1rem;">Time Out</th>
                        </tr>
                      </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        @foreach ($loginformation as $index => $loginfo)
                        <?php $total++; ?>
                          <tr>
                            <td style="font-size:1rem;">{{ $index + 1 }}</td>
                            <td style="font-size:1rem;">{{ $loginfo->dayin }}</td>
                            <td style="font-size:1rem;">{{ $loginfo->usertype }}</td>
                            <td style="font-size:1rem;">{{ $loginfo->name }}</td>
                            <td style="font-size:1rem;">{{ $loginfo->contactNumber }}</td>
                            <td style="font-size:1rem;">{{ $loginfo->purposeOfVisit }}</td>
                            <td style="font-size:1rem;">{{ $loginfo->nameToVisit }}</td>
                            <td style="font-size:1rem;">{{ $loginfo->roomToVisit }}</td>
                            <td style="font-size:1rem;"><a href="/vaccineInfo/{{ $loginfo->userid }}" class="btn btncolor">
                              <i class="fa fa-eye"></i> View ID</a></td>
                            <td style="font-size:1rem;">{{ $loginfo->timein }}</td>
                            <td style="font-size:1rem;">{{ $loginfo->timeout }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <label>Total: <?php echo $total; ?></label>
                        {{ $loginformation->links() }}
                    </div><br>
                    
                    <button id="btnExportToCsv" type="button" class="button">Export to CSV</button>
                    <script>
                      class TableCSVExporter {
                            constructor(table, includeHeaders = true) {
                                this.table = table;
                                this.rows = Array.from(table.querySelectorAll("tr"));

                                if (!includeHeaders && this.rows[0].querySelectorAll("th").length) {
                                    this.rows.shift();
                                }
                            }

                            convertToCSV() {
                                const lines = [];
                                const numCols = this._findLongestRowLength();

                                for (const row of this.rows) {
                                    let line = "";

                                    for (let i = 0; i < numCols; i++) {
                                        if (row.children[i] !== undefined) {
                                            line += TableCSVExporter.parseCell(row.children[i]);
                                        }

                                        line += (i !== (numCols - 1)) ? "," : "";
                                    }

                                    lines.push(line);
                                }

                                return lines.join("\n");
                            }

                            _findLongestRowLength() {
                                return this.rows.reduce((l, row) => row.childElementCount > l ? row.childElementCount : l, 0);
                            }

                            static parseCell(tableCell) {
                                let parsedValue = tableCell.textContent;

                                // Replace all double quotes with two double quotes
                                parsedValue = parsedValue.replace(/"/g, `""`);

                                // If value contains comma, new-line or double-quote, enclose in double quotes
                                parsedValue = /[",\n]/.test(parsedValue) ? `"${parsedValue}"` : parsedValue;

                                return parsedValue;
                            }
                        }
                        const dataTable = document.getElementById("dataTable");
                        const btnExportToCsv = document.getElementById("btnExportToCsv");

                        btnExportToCsv.addEventListener("click", () => {
                            const exporter = new TableCSVExporter(dataTable);
                            const csvOutput = exporter.convertToCSV();
                            const csvBlob = new Blob([csvOutput], { type: "text/csv" });
                            const blobUrl = URL.createObjectURL(csvBlob);
                            const anchorElement = document.createElement("a");

                            anchorElement.href = blobUrl;
                            anchorElement.download = "table-export.csv";
                            anchorElement.click();

                            setTimeout(() => {
                                URL.revokeObjectURL(blobUrl);
                            }, 500);
                        });
                    </script>

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