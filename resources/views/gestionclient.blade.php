@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><b>GESTION COMPTES CLIENTS</b></div>
                <div class="panel-body">
                    <div class="col-lg-12 text-center">
                        <div class="col-md-offset-3 col-md-6 text-center">
                            <form role="form" action="{{action('GestionClientController@FiltreClient')}}" method="post">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <input placeholder="Rechercher un client (Nom)" name="name" type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <center><button type="submit" class="btn btn-warning">Rechercher</button></center>
                                    </div>
                                    <div class="form-group col-lg-1">
                                        <a href="{{ url('/gestionclient') }}" class="btn btn-info">Retour</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="col-lg-1"><b>Genre</b></div>
                        <div class="col-lg-1"><b>Prénom</b></div>
                        <div class="col-lg-1"><b>Nom</b></div>
                        <div class="col-lg-2"><b>Email</b></div>
                        <div class="col-lg-2"><b>Numero de téléphone</b></div>
                        <div class="col-lg-1"><b>Action</b></div>
                        <br><br>
                        @foreach ($client as $patate)
                                <div class="col-lg-1">{{  $patate->civilite }}</div>
                                <div class="col-lg-1">{{  $patate->prenom }}</div>
                                <div class="col-lg-1">{{  $patate->name }}</div>
                                <div class="col-lg-2">{{  $patate->email }}</div>
                                <div class="col-lg-2">{{  $patate->numero_telephone }}</div>
                                <div class="col-lg-1"><a href="/client/{{ $patate-> id }}"> <b><u>Détails</u></b></a></div>
                                <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
