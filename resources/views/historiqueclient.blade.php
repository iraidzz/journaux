@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>HISTORIQUES DE COMMUNICATION AVEC LES CLIENTS</b></div>
                    <div class="panel-body">
                        <div class ="container">
                            <div class="row">
                                <div class="col-lg-12 text-center"><a href="/creerhistoriqueglobal"><b><u><i>Ajouter un historique</i></u></b></a></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-1"><b><u>Client</u></b></div>
                                <div class="col-lg-1"><b><u>Employe</u></b></div>
                                <div class="col-lg-2"><b><u>Moyen de communication</u></b></div>
                                <div class="col-lg-2"><b><u>Date</u></b></div>
                                <div class="col-lg-4"><b><u>Commentaire</u></b></div>
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
