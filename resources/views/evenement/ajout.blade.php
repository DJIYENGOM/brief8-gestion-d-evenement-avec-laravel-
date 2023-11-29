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


                <form method="post" action="/AjoutEven" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="libelle">Libelle</label>
                        <input type="text" class="form-control" id="libelle" placeholder="Ajouter un Nom" name="libelle">

                    </div>

                    <div class="form-group">
                        <label for="date_limite">Date limite des inscription</label>
                        <input type="date" class="form-control" id="date_limite" placeholder="Date limite des inscription" name="date_limite">

                    </div>

                    <div class="form-group">
                        <label for="description">Description de l'evenement</label>
                        <input type="text" class="form-control" id="description" placeholder="ajouter une description" name="description">

                    </div>

                    <div class="form-group">
                        <label for="image">
                            Ajoutez une photo en avant<br /></label>
                        <input type="file" id="image" name="image" />
                    </div>

                   

                    <div class="form-group">
                        <label for="lieu">Lieu de l'evenement</label>
                        <input type="text" class="form-control" id="lieu" placeholder="Enter l'adress" name="lieu">
                    </div>

                    <div class="form-group">
                        <label for="">cloture l'evenement</label>
                        <select name="cloture" id="">
                            <option value="non">NON</option>
                            <option value="oui">OUI</option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="date_env">Date de l'evenement</label>
                        <input type="date" class="form-control" id="date_env" placeholder="Date limite des inscription" name="date_env">

                    </div>
                   
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    {{-- <button type="submit" class="btn btn-primary offset-4 mt-2">Ajouter</button> --}}

                    <input type="submit" name="Register" value="Ajouter " class="form-control form-control-user" id="Register">

                </form>
            </div>
        </div>
    </div>
</div>
@endsection