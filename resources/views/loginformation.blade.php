<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Log Information Table') }}
        </h2>
    </x-slot>

    <div class="table-responsive mt-5 p-5">
        <table class="table table-striped">
            <thead>
                <tr class="bg-blue-900">
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Date of Visit</th>
                    <th>Purpose</th>
                    <th>Name of Room Owner To Visit</th>
                    <th>Room to Visit</th>
                    <th>Time In</th>
                    <th>Time Out</th>
                </tr>
            </thead>
            <tbody>
                @foreach($loginformation as $loginfo)
                <tr>
                    <th scope="row">{{ $loginfo->id }}</th>
                    <td>{{ $loginfo->name }}</td>
                    <td>{{ $loginfo->gender }}</td>
                    <td>{{ $loginfo->contactNumber }}</td>
                    <td>{{ $loginfo->dateOfVisit }}</td>
                    <td>{{ $loginfo->purposeOfVisit }}</td>
                    <td>{{ $loginfo->nameToVisit }}</td>
                    <td>{{ $loginfo->roomToVisit }}</td>
                    <td>{{ $loginfo->created_at }}</td>
                    <td>{{ $loginfo->timeout }}</td>
                  </tr>
                  @endforeach
            </tbody>
        </table>
    </div><br>

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>