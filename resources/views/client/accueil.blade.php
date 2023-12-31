{{-- @extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<div class="col-12 m-4 p-4 ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Image</th>
                <th scope="col">libelle</th>
                <th scope="col">Description</th>
                <th scope="col">D. limite</th>
                <th scope="col">Date de l'even</th>
                <th scope="col">Cloture</th>
                <th scope="col">Lieu</th>

                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evens as $even)
                
            <tr>
            <td>{{$even->id}}</td>
                <td>
                    <img src="{{ asset('storage/' . $even->image) }}"
                alt="bien-avatar" style="max-width: 50px; max-height: 100px;">
                </td>
                <td>{{$even->libelle}}</td>
                <td>{{$even->description}}</td>
                <td>{{$even->date_limite}}</td>
                <td>{{$even->date_env}}</td>
                <td>{{$even->cloture}}</td>
                <td>{{$even->lieu}}</td>

                <td>
                    <form action="{{route('delete', [$even->id])}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>

                    <a href="{{route('modifier', [$even->id])}}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

@extends('layouts.appClient')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($evens as $even)
                <div class="col-12 col-md-3 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <div class=" d-flex justify-content-between">
                            <h5 class="card-title">{{$even->libelle}}</h5>
                            <span class="card-title"> {{$even->lieu}}</span>
                            </div>
                        </div>
                          <img src="{{asset('storage/'. $even->image)}}" alt="" width="262" height="242">
                       
                        <div class="card-body">
                            <h5 class="card-title">Date limite des Reservation: {{$even->date_limite}}</h5>
                            <h5 class="card-title">Pour plus d'information consultez le detail</h5>
                           
                            <a href="/voirplus/{{$even->id}}" class="btn btn-secondary">Voir les detail</a>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
