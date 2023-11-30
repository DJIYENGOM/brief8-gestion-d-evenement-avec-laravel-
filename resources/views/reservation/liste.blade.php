@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="col-12 m-4 p-4 ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email</th>
                <th scope="col">Nombre de place reservé</th>
                <th scope="col">Statut</th>


                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                
            <tr>
            <td>{{$reservation->id}}</td>
                <td>{{$reservation->email}}</td>
                <td>{{$reservation->nombre_place }}</td>
                <td>{{$reservation->accepter}}</td>

                

                <td>

                    <a href="/refuser/{{$reservation->id}}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> refuser
                    </a>
                   
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
