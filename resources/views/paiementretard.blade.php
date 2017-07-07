@extends('layouts.template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading"><b>PAIEMENT EN RETARD</b></div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Titre magazine</th>
                                <th>Date debut</th>
                                <th>Prix</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($paiement as $paye)
                                <tr>
                                    <td>{{  $paye->client->name }}</td>
                                    <td>{{  $paye->publication->titre }}</td>
                                    <td><?=date_format(date_create($paye->date_debut), 'd/m/Y');?></td>
                                    <td>{{  $paye->prix }} €</td>
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
