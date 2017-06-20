@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">

                <div class="panel panel-default">
                    <div class="panel-heading">GESTION COMPTES CLIENTS</div>

                    <div class="panel-body">




                        @foreach ($client as $patate)

                            <div class ="container">
                                <div class="row">



                                    <div class="col1">{{  $patate->id }}</div>
                                    <div class="col2">{{  $patate->civilite }}</div>
                                    <div class="col3">{{  $patate->nom }}</div>
                                    <div class="col4">{{  $patate->email }}</div>
                                    <div class="col5">{{  $patate->numero_telephone }}</div>
                                    <div class="col6"><a href="/client/{{ $patate-> id }}"> détails</a></div>



                                </div>
                            </div>

                            @endforeach





                    </div>
                </div>
        </div>
    </div>
@endsection
