@extends('layouts.app')
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
<div class="container">
    <div class="card">
        <div class="col-md-6 offset-3 mt-5">
            <h5 class="card-header text-center bg-primary text-white">AJOUT UN EVENEMENT</h5>
            <div class="card-body">


                <form method="post" action="/modifier/{id}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="id" , style="display: none" value="{{$even->id}}">


                    <div class="form-group">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" id="libelle" value="{{$even->libelle}}" name="libelle">

                    </div>

                    <div class="form-group">
                        <label for="date_limite">Date limite des inscription</label>
                        <input type="date" class="form-control" id="date_limite" value="{{$even->date_limite}}" name="date_limite">

                    </div>

                    <div class="form-group">
                        <label for="description">Description de l'evenement</label>
                        <input type="text" class="form-control" id="description" value="{{$even->description}}" name="description">

                    </div>

                   
                    {{-- l'ancien image --}}
                <div class="mb-3">
                    <label class="form-label mt-3">Image actuelle</label>
                    <img src="{{ asset('storage/' . $even->image) }}" alt="Current Image"
                        class="img-thumbnail" style="max-width: 100px;">
                </div>

                <div class="form-group">
                    <label for="image">
                        Ajoutez une photo en avant<br /></label>
                    <input type="file" id="image" name="image" />
                </div>


                    <div class="form-group">
                        <label for="lieu">Lieu de l'evenement</label>
                        <input type="text" class="form-control" id="lieu" value="{{$even->lieu}}" name="lieu">
                    </div>

                    <div class="form-group">
                        <label for="">cloture</label>
                        <select name="cloture" id="" class="form-control">
                            <option value="non" @if($even->cloture == 'non') selected @endif>NON</option>
                            <option value="oui" @if($even->cloture == 'oui') selected @endif>OUI</option>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="date_env">Date de l'evenement</label>
                        <input type="date" class="form-control" id="date_env" value="{{$even->date_env}}" name="date_env">

                    </div>
                   
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    {{-- <button type="submit" class="btn btn-primary offset-4 mt-2">Ajouter</button> --}}

                    <input type="submit" name="Register" value="modifie " class="form-control form-control-user" id="Modifier">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection