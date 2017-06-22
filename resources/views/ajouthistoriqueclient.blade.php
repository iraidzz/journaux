@extends('layouts.template')
@section('content')


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
                            <div class="form-group col-lg-6">
                                <label>Client concerné</label>
                                <input name="nom" type="text" class="form-control">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Employé concerné</label>
                                <input name="prenom" disabled type="text" class="form-control" value="{{ Auth::user()->name }}">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Moyen de communication</label>
                                <select name="moyencommunication" type="text" class="form-control">
                                    <option value="Email" selected>Email</option>
                                    <option value="Telephone">Téléphone</option>
                                    <option value="Courrier">Courrier</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Date</label>
                                <input name="password" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" >
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Commentaire</label>
                                <textarea name="numero_telephone" type="text" class="form-control"></textarea>
                            </div>


                            <div class="form-group col-lg-12">
                                <center><button type="submit" class="btn btn-default">Ajouter un historique.</button></center>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection
