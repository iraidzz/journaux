@extends('layouts.template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Genre</th>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Numero de téléphone</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($client as $patate)
                                <tr>
                                    <td>{{  $patate->civilite }}</td>
                                    <td>{{  $patate->prenom }}</td>
                                    <td>{{  $patate->name }}</td>
                                    <td>{{  $patate->email }}</td>
                                    <td>{{  $patate->numero_telephone }}</td>
                                    <td><a href="/client/{{ $patate-> id }}"> <b><u>Détails</u></b></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
