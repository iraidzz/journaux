@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">GESTION COMPTES CLIENTS</div>

                    <div class="panel-body">






                        @foreach ($client as $patate)

                            <div class ="container">
                                <div class="row">
                                    <div class="box">

                                      {{  $patate->nom }}
                                        {{  $patate->prenom }}

                                    </div>
                                </div>
                            </div>

                            @endforeach





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
