@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="box text-center">
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text text-center">Créer une
                        <strong>publication</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-offset-3 col-md-6 text-center">
                    <form role="form" action="{{action('PublicationController@ajouterPublication')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>Titre publication</label>
                                <input name="titre" type="text" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Image de l'article (URL Internet)</label>
                                <input name="photo_couverture" type="text" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Texte publication</label>
                                <textarea name="description" class="form-control" rows="6"></textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Prix à l'année</label>
                                <input name="prix_annuel" placeholder="Prix en €" type="number" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Nombre de parutions à l'année</label>
                                <input name="nombre_numero" type="text" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                                <center><button type="submit" class="btn btn-default">Créer la publication.</button></center>
                            </div>
                            <p style="color:green"><?php echo Session::get('message'); ?></p>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
