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
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text text-center" style=" margin-bottom: 20px; ">Liste des
                        <strong>magazines</strong>
                    </h2>
                    <div class="col-md-offset-3 col-md-6 text-center">
                        <form role="form" action="{{action('PublicationController@FiltreMagazine')}}" method="post">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="form-group col-lg-8">
                                    <input placeholder="Rechercher un magazine" name="titre" type="text" class="form-control">
                                </div>
                                <div class="form-group col-lg-3">
                                    <button type="submit" class="btn btn-warning">Rechercher</button>
                                </div>
                                <div class="form-group col-lg-1">
                                    <a href="{{ url('/listemagazine') }}" class="btn btn-info">Retour</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <ul class="pager" style="margin-top: 0px;margin-bottom: 0px;height: 50px;">
                        {{$publication->links()}}
                    </ul>
                    @foreach($publication as $article)
                        <hr class="hr-primary" /><br><br>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group col-lg-12">
                                    <label>Titre publication</label>
                                    <input name="titre" type="text" disabled value="{{$article->titre}}" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-12">
                                    <label>Texte publication</label>
                                    <textarea name="description" class="form-control" disabled rows="6">{{$article->description}}</textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Prix à l'année</label>
                                    <input name="prix_annuel" type="text" disabled value="{{$article->prix_annuel}} €" class="form-control">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Nombre de parutions à l'année</label>
                                    <input name="nombre_numero" type="text" disabled value="{{$article->nombre_numero}} Numéros" class="form-control">
                                </div>
                                <div class="form-group col-lg-12">
                                    <center><a href="/journaux/public/publication/{{$article->id}}" class="btn btn-primary">Editer le publication</a></center>
                                </div>
                            </div>
                            <div class="col-lg-4"><br><br>
                                <img width="210px" height="100px" class="img-responsive img-border img-full" src="{{$article->photo_couverture}}" alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <ul class="pager">
                    {{$publication->links()}}
                </ul>
            </div>
        </div>
    </div>
@endsection

