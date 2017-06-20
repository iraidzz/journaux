@extends('layouts.template')
@section('content')

@foreach ($client as $patate)


    <div class="container">
        <div class="row">
            <div class="box text-center">
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text text-center">Modifier un
                        <strong>client</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-offset-3 col-md-6 text-center">
                    <form role="form" action="{{action('GestionClientController@EditClient')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <input name="user_id" type="hidden" value="" class="form-control">

                            <div class="form-group col-lg-6">
                                <label>Genre</label>
                                <input name="civilite" type="text" class="form-control" value="{{  $patate->civilite }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Nom</label>
                                <input name="nom" type="text" class="form-control" value="{{  $patate->nom }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Prénom</label>
                                <input name="prenom" type="text" class="form-control" value="{{  $patate->prenom }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Email</label>
                                <input name="email" type="email" class="form-control" value="{{  $patate->email }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" value="{{  $patate->password }}">
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Numero de téléphone</label>
                                <input name="numero_telephone" type="text" class="form-control" value="{{  $patate->numero_telephone }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Date de naissance</label>
                                <input name="date_naissance" type="text" class="form-control" value="{{  $patate->date_naissance }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Lieu naissance</label>
                                <input name="lieu_naissance" type="text" class="form-control" value="{{  $patate->lieu_naissance }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Adresse de domicile</label>
                                <input name="adresse_domicile" type="text" class="form-control" value="{{  $patate->adresse_domicile }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Code postal</label>
                                <input name="postal_domicile" type="text" class="form-control" value="{{  $patate->postal_domicile }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Ville</label>
                                <input name="ville_domicile" type="text" class="form-control" value="{{  $patate->ville_domicile }}">
                            </div>



                            <div class="form-group col-lg-12">
                                <center><button type="submit" class="btn btn-default">Modifier le client.</button></center>
                            </br>
                                <a href="/deleteclient/{{ $patate-> id }}"> Supprimer le client</a>
                            </div>
                            <p style="color:green"><?php echo Session::get('message'); ?></p>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    @endforeach
@endsection
