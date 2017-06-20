@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">HISTORIQUES AVEC LES CLIENTS</div>

                    <div class="panel-body">


                        @foreach ($historique as $patate)

                            <div class ="container">
                                <div class="row">
                                    <div class="col-lg-1">Client</div>
                                    <div class="col-lg-1">Employe</div>
                                    <div class="col-lg-1">Moyen de communication</div>
                                    <div class="col-lg-2">Date</div>
                                    <div class="col-lg-2">Commentaire</div>

                                    <br><br>


                                        <div class="col-lg-1">{{  $patate-> client -> nom }}</div>
                                        <div class="col-lg-1">{{  $patate-> employe -> nom }}</div>
                                        <div class="col-lg-1">{{  $patate->type_communication }}</div>
                                        <div class="col-lg-2">{{  $patate->date }}</div>
                                        <div class="col-lg-2">{{  $patate->commentaire }}</div>
                                        <br>


                                </div>
                            </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
