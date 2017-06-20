@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">

                <div class="panel panel-default">
                    <div class="panel-heading">GESTION COMPTES CLIENTS</div>

                    <div class="panel-body">

                        <div class ="container">
                            <div class="row">
                        <div class="col-lg-1">Genre</div>
                        <div class="col-lg-1">Prénom</div>
                        <div class="col-lg-1">Nom</div>
                        <div class="col-lg-2">Email</div>
                        <div class="col-lg-2">Numero de téléphone</div>
                        <div class="col-lg-1">Action</div>
                        <br><br>


                            @foreach ($client as $patate)



                                    <div class="col-lg-1">{{  $patate->civilite }}</div>
                                    <div class="col-lg-1">{{  $patate->prenom }}</div>
                                    <div class="col-lg-1">{{  $patate->nom }}</div>
                                    <div class="col-lg-2">{{  $patate->email }}</div>
                                    <div class="col-lg-2">{{  $patate->numero_telephone }}</div>
                                    <div class="col-lg-1"><a href="/client/{{ $patate-> id }}"> détails</a></div>
                                    <br>




                            @endforeach

                    </div>
                </div>



                    </div>
                </div>
        </div>
    </div>
@endsection
