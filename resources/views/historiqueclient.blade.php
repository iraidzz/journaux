@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <a href="/creerhistoriqueglobal">Ajouter un historique</a>
                </center>
                <div class="panel panel-default">
                    <div class="panel-heading">HISTORIQUES DE COMMUNICATION AVEC LES CLIENTS</div>

                    <div class="panel-body">




                            <div class ="container">
                                <div class="row">
                                    <div class="col-lg-1">Client</div>
                                    <div class="col-lg-1">Employe</div>
                                    <div class="col-lg-2">Moyen de communication</div>
                                    <div class="col-lg-2">Date</div>
                                    <div class="col-lg-4">Commentaire</div>

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
