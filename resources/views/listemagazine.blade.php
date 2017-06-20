@extends('layouts.template')

@section('content')
    <style>
        hr {
            height: 4px;
            margin-left: 15px;
            margin-bottom:-3px;
        }
        .hr-primary{
            background-image: -webkit-linear-gradient(left, rgba(555,133,244,.6), rgba(66, 133, 244,.6), rgba(0,0,0,0));
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Liste des
                        <strong>magazines</strong>
                    </h2>
                </div>
                <div class="col-lg-12 text-center">
                    @foreach($publication as $article)
                        <hr class="hr-primary" /><br><br>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group col-lg-6">
                                    <label>Titre publication</label>
                                    <input name="titre" type="text" disabled value="{{$article->titre}}" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Image de l'article (URL Internet)</label>
                                    <input name="photo_couverture" type="text" disabled value="{{$article->photo_couverture}}" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">
                                    <label>Texte publication</label>
                                    <textarea name="description" class="form-control" disabled rows="6">{{$article->description}}</textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Prix à l'année</label>
                                    <input name="prix_annuel" type="text" disabled value="{{$article->prix_annuel}}"
                                           class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nombre de parutions à l'année</label>
                                    <input name="nombre_numero" type="text" disabled value="{{$article->nombre_numero}}"
                                           class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <center><a href="/publication/{{$article->id}}" class="btn btn-primary">Editer le publication</a></center>
                                </div>
                            </div>
                            <div class="col-lg-4"><br><br>
                                <img width="210px" height="100px" class="img-responsive img-border img-full" src="{{$article->photo_couverture}}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection

