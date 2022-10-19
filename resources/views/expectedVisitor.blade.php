<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expected Visitors Table') }}
        </h2>
    </x-slot>

    <div class="table-responsive mt-5 p-5">
        <table class="table table-striped">
            <thead>
                <tr class="bg-blue-900">
                    <th>ID</th>
                    <th>Room Owner</th>
                    <th>Room Number</th>
                    <th>Name Of Visitor</th>
                    <th>Date Of Visit</th>
                    <th>Purpose Of Visit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expectedVisitor as $visitors)
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

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>