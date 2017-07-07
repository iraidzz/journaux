@extends('layouts.template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>HISTORIQUES DE COMMUNICATION AVEC LES CLIENTS</b></div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 text-center"><a href="/creerhistoriqueglobal"><b><u><i>Ajouter un historique</i></u></b></a></div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Employe</th>
                                <th>Moyen de communication</th>
                                <th>Date</th>
                                <th>Commentaire</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($historique as $patate)
                                <tr>
                                    <td>{{  $patate-> user -> name }}</td>
                                    <td>{{  $patate-> user_employe -> name }}</td>
                                    <td>{{  $patate->type_communication }}</td>
                                    <td><?=date_format(date_create($patate->date), 'd/m/Y');?></td>
                                    <td>{{  $patate->commentaire }}</td>
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
