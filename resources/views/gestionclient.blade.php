@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading"><b>GESTION COMPTES CLIENTS</b></div>
                <div class="panel-body">
                    <div class ="container">

                        <form role="form" action="{{action('GestionClientController@FiltreClient')}}" method="post">
                            <label>Filtre sur nom</label>
                            <input name="nom" type="text" class="form-control">
                            {!! csrf_field() !!}
                        </form>

                        <div class="row">
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
    </div>
@endsection
