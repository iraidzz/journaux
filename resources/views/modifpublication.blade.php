@extends('layouts.template')

@section('content')
    @foreach ($publication as $value)
    <div class="container">
        <div class="row">
            <div class="box text-center">
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text text-center">Modifier la
                        <strong>publication</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-offset-3 col-md-6 text-center">
                    <form role="form" action="{{action('PublicationController@EditPublication')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <input name="id" type="hidden" value="{{$value->id}}" class="form-control">
                            <center><img width="210px" height="100px" class="img-responsive img-border img-full" src="{{$value->photo_couverture}}" alt=""></center><br>
                            <div class="form-group col-lg-6">
                                <label>Titre publication</label>
                                <input name="titre" type="text" value="{{$value->titre}}" class="form-control" required>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Image de l'article </label>
                                {!! Form::file('photo') !!}
                            </div>

                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Texte publication</label>
                                <textarea name="description" class="form-control" rows="6" required>{{$value->description}}</textarea>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Prix à l'année</label>
                                <input name="prix_annuel" type="number" value="{{$value->prix_annuel}}" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Nombre de parutions à l'année</label>
                                <input name="nombre_numero" type="number" value="{{$value->nombre_numero}}" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <center><button type="submit" class="btn btn-default">Modifier</button></center>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
