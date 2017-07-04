@extends('layouts.template')
@section('content')


    <div class="container">
        <div class="row">
            <div class="box text-center">
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text text-center">Ajout d'un
                        <strong>Abonnement</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-offset-3 col-md-6 text-center">

                    @foreach ($client as $clients)

                        <form role="form" action="{{action('AbonnementClientController@AjoutAbonnementClient')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="form-group col-lg-6">

                                    <input name="client_id" type="hidden" class="form-control" value="{{$clients -> id}}">

                                    <label>Client concerné</label>
                                    <input name="affichage_nom_client" disabled type="text" class="form-control" value="{{$clients -> name}}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Magazines</label>
                                    <select name="magazine" type="text" class="form-control">
                                        @foreach ($publi as $publications)
                                        <option value="{{$publications -> id}}" selected>{{$publications -> titre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date</label>
                                    <input name="date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" >
                                </div>


                                    <input name="etat" type="hidden" class="form-control" value="1">


                                <div class="form-group col-lg-12">

                                    <center><button type="submit" class="btn btn-default">Ajouter un abonnement.</button></center>

                                </div>
                            </div>
                        </form>

                    @endforeach

                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
