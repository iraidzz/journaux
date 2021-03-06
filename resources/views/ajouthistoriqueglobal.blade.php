@extends('layouts.template')
@section('content')


    <div class="container">
        <div class="row">
            <div class="box text-center">
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text text-center">Ajouter un historique
                        <strong>global</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-md-offset-3 col-md-6 text-center">
                    <form role="form" id="test" action="{{action('HistoriqueClientController@ajouterHistoriqueGlobal')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Employé concerné</label>
                                <input name="affichage_nom_employe" disabled type="text" class="form-control" value="{{ Auth::user()->name }}">
                            </div>

                            <div class="form-group col-lg-12">
                                <label for="sel2">Selection multiple de clients (Maintenir Ctrl pour en sélectionner plusieurs):</label>
                                <select multiple class="form-control" name="client_id[]" size="5" required>
                                    @foreach ($client as $patate)
                                        <option value="{{ $patate->id }}">{{ $patate->prenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input name="employe_id" type="hidden" class="form-control" value="{{ Auth::user()->id }}">



                            <div class="form-group col-lg-6">
                                <label>Moyen de communication</label>
                                <select name="type_communication" type="text" class="form-control">
                                    <option value="Email" selected>Email</option>
                                    <option value="Telephone">Téléphone</option>
                                    <option value="Courrier">Courrier</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Date</label>
                                <input name="date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Commentaire</label>
                                <textarea name="commentaire" type="text" class="form-control" required></textarea>
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
