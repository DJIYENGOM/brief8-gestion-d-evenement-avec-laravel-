@extends('layouts.appClient')
@section('content')
@if(count($errors) > 0)
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    @foreach($errors->all() as $error)
    {{ $error }}
    <strong>Oh snap!</strong>
    @endforeach
</div>
@endif

<div class="container  offset-2">
    <div class="card mb-4 mt-4" style=" width:80%;">
        <img src="{{asset('storage/'.$even->image)}}" class="img-fluid rounded-start" alt="" style="height: 350px; width: 100%;">
        <div class="row">
            <div class="card-body">
                <h5 class="card-title">Nom de l'evenement: {{$even->libelle}}</h5>
                <h5 class="card-title">Jour de l'evenement: {{$even->date_env}}</h5>
                <p class="card-text">Description: {{ $even->description}}</p>
                <p class="card-text">Lieu: {{$even->lieu}}</p>
                <p class="card-text">Cloturer: {{ $even->cloture}}</p>
                <p class="card-text">Date limite des Reservation: {{ $even->date_limite}}</p>
                <a href="{{'/liste/even'}}" class="btn btn-info">Retour</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
     {{-- <h2>faire une Reservation</h2> --}}
    <form action="/reservation/ajout/{{$even->id}}" method="post">
        @csrf
        <fieldset>
            <legend>Faire une Reservation</legend>
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label mt-4">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">Nombre de places Reservé</label>
                <input type="number" class="form-control" name="nombre_place" id="" placeholder="entrez le nombre">
              </div>
       
        <input type="hidden" name="even_id" value="{{ $even->id }}">
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <button type="submit" class="btn btn-primary">Reserver</button>
       </fieldset>
    </form>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@endsection