@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="/creerhistoriqueglobal"><b><u><i>Ajouter un historique</i></u></b></a>
                </center><br>
                <div class="panel panel-default">
                    <div class="panel-heading"><b>HISTORIQUES DE COMMUNICATION AVEC LES CLIENTS</b></div>

                    <div class="panel-body">
                            <div class ="container">
                                <div class="row">
                                    <div class="col-lg-1"><b>Client</b></div>
                                    <div class="col-lg-1"><b>Employe</b></div>
                                    <div class="col-lg-2"><b>Moyen de communication</b></div>
                                    <div class="col-lg-2"><b>Date</b></div>
                                    <div class="col-lg-4"><b>Commentaire</b></div>
                                    <br><br>
                                    @foreach ($historique as $patate)
                                        <div class="col-lg-1">{{  $patate-> user -> name }} </div>
                                        <div class="col-lg-1">{{  $patate-> user_employe -> name }}</div>
                                        <div class="col-lg-2">{{  $patate->type_communication }}</div>
                                        <div class="col-lg-2">{{  $patate->date }}</div>
                                        <div class="col-lg-4">{{  $patate->commentaire }}</div>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
