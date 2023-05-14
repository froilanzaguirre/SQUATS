<h2 class="text-dark text-xl ml-4">LIST OF RESIDENTS</h2>
<table id="docTable" class="table table-striped">
    <thead>
        <tr>
            <th>List #</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Contact Number</th>
            <th>Room Number</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        @foreach ($users as $index => $user)
        <?php $total++; ?>
        <tr>
            <td>{{ $index +1  }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->contactNumber }}</td>
            <td>{{ $user->roomToVisit }}</td>
        </tr>
        @endforeach
        <label>Total: <?php echo $total; ?></label>
    </tbody>
</table>
<h2 class="text-dark text-xl ml-4">LIST OF STAFF</h2>
<table id="docTable" class="table table-striped">
    <thead>
        <tr>
            <th>List #</th>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Contact Number</th>
            <th>Room Number</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        @foreach ($staffs as $index => $user)
        <?php $total++; ?>
        <tr>
            <td>{{ $index +1  }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->contactNumber }}</td>
            <td>{{ $user->roomToVisit }}</td>
        </tr>
        @endforeach
        <label>Total: <?php echo $total; ?></label>
    </tbody>
</table>

<style>
    #docTable {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #docTable td,
    #docTable th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #docTable tr:nth-child(even) {
        background-color: #888888;
    }

    #docTable th {
        padding-top: 12px;
        padding-bottom: 12px;
        background-color: #202020;
        color: #fff;
    }

    body {
        position: relative;
        width: 21cm;
        height: 29.7cm;
        margin: 0 auto;
        color: #555555;
        background: #FFFFFF;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-family: SourceSansPro;
    }

    header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #AAAAAA;
    }

    #logo {
        float: left;
        margin-top: 8px;
    }

    #logo img {
        height: 70px;
    }

    #company {
        float: right;
        text-align: right;
    }


    #details {
        margin-bottom: 50px;
    }

    #client {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        float: left;
    }

    #client .to {
        color: #777777;
    }

    h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
    }
    h2{
        font-size: 1.5rem;
        font-weight: normal;
        color:black;
    }

    #invoice {
        float: right;
        text-align: right;
    }

    #invoice h1 {
        color: #0087C3;
        font-size: 2.4em;
        line-height: 1em;
        font-weight: normal;
        margin: 0 0 10px 0;
    }

    #invoice .date {
        font-size: 1.1em;
        color: #777777;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table th,
    table td {
        padding: 20px;
        background: #EEEEEE;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    table th {
        white-space: nowrap;
        font-weight: normal;
    }

    table td {
        text-align: right;
    }

    table td h3 {
        color: #57B223;
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 0.2em 0;
    }

    table .no {
        color: #FFFFFF;
        font-size: 1.6em;
        background: #57B223;
    }

    table .desc {
        text-align: left;
    }

    table .unit {
        background: #DDDDDD;
    }

    table .qty {}

    table .total {
        background: #57B223;
        color: #FFFFFF;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table tbody tr:last-child td {
        border: none;
    }

    table tfoot td {
        padding: 10px 20px;
        background: #FFFFFF;
        border-bottom: none;
        font-size: 1.2em;
        white-space: nowrap;
        border-top: 1px solid #AAAAAA;
    }

    table tfoot tr:first-child td {
        border-top: none;
    }

    table tfoot tr:last-child td {
        color: #57B223;
        font-size: 1.4em;
        border-top: 1px solid #57B223;

    }

    table tfoot tr td:first-child {
        border: none;
    }

    #thanks {
        font-size: 2em;
        margin-bottom: 50px;
    }

    #notices {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
    }

    #notices .notice {
        font-size: 1.2em;
    }

    footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #AAAAAA;
        padding: 8px 0;
        text-align: center;
    }

    .clearfix:after {
        content: "";
        display: table;
        clear: both;
    }

    a {
        color: #0087C3;
        text-decoration: none;
    }
</style>
