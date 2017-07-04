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
                            <input name="id" type="hidden" class="form-control" value="{{  $patate->id }}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <input name="user_id" type="hidden" value="" class="form-control">

                                <div class="form-group col-lg-6">
                                    <label>Genre</label>
                                    <select name="civilite" type="text" class="form-control">
                                        <?php
                                        if($patate->civilite == 'MR')
                                        {
                                        ?>
                                        <option value="MR" selected>MR</option>
                                        <option value="MME">MME</option>
                                        <?php
                                        }
                                        elseif($patate->civilite == 'MME')
                                        {
                                        ?>
                                        <option value="MR">MR</option>
                                        <option value="MME" selected>MME</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Nom</label>
                                    <input name="name" type="text" class="form-control" value="{{  $patate->name }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Prénom</label>
                                    <input name="prenom" type="text" class="form-control"
                                           value="{{  $patate->prenom }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Email</label>
                                    <input name="email" type="email" class="form-control" value="{{  $patate->email }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control"
                                           value="{{  $patate->password }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Numero de téléphone</label>
                                    <input name="numero_telephone" type="text" class="form-control"
                                           value="{{  $patate->numero_telephone }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Date de naissance</label>
                                    <input name="date_naissance" type="text" class="form-control"
                                           value="{{  $patate->date_naissance }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Lieu naissance</label>
                                    <input name="lieu_naissance" type="text" class="form-control"
                                           value="{{  $patate->lieu_naissance }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Adresse de domicile</label>
                                    <input name="adresse_domicile" type="text" class="form-control"
                                           value="{{  $patate->adresse_domicile }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Code postal</label>
                                    <input name="postal_domicile" type="text" class="form-control"
                                           value="{{  $patate->postal_domicile }}">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Ville</label>
                                    <input name="ville_domicile" type="text" class="form-control"
                                           value="{{  $patate->ville_domicile }}">
                                </div>


                                <div class="form-group col-lg-12">
                                    <center>
                                        <button type="submit" class="btn btn-default">Modifier le client.</button>
                                    </center>
                                    </br>
                                    <a href="/deleteclient/{{ $patate-> id }}"> <b><u>Supprimer le client</u></b></a>
                                </div>
                                <p style="color:green"><?php echo Session::get('message'); ?></p>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="row">
                <div class="box text-center">
                    <hr>
                    <h2 class="intro-text text-center">Historique du
                        <strong>client</strong></h2>
                    <hr>
                    <a href="/displayajouthistoriqueclient/{{ $patate-> id }}"><b><u>Ajouter un historique</u></b></a>
                    <br><br>
                    <div class="col-lg-2"><b>Client</b></div>
                    <div class="col-lg-2"><b>Employe</b></div>
                    <div class="col-lg-2"><b>Moyen de communication</b></div>
                    <div class="col-lg-2"><b>Date</b></div>
                    <div class="col-lg-4"><b>Commentaire</b></div>
                    <br>
                    @foreach ($histo as $historique)
                        <br>
                        <div class="col-lg-2">{{  $historique-> user -> name }} </div>
                        <div class="col-lg-2">{{  $historique-> user_employe -> name }}</div>
                        <div class="col-lg-2">{{  $historique->type_communication }}</div>
                        <div class="col-lg-2">{{  $historique->date }}</div>
                        <div class="col-lg-4">{{  $historique->commentaire }}</div>
                    @endforeach
                </div>
            </div>




            <div class="row">
                <div class="box text-center">
                    <hr>
                    <h2 class="intro-text text-center">Abonnement du
                        <strong>client</strong></h2>
                    <hr>

                    <br><br>
                    <div class="col-lg-3"><b>Magazine</b></div>
                    <div class="col-lg-2"><b>Date abonnement</b></div>
                    <div class="col-lg-2"><b>Date fin</b></div>
                    <div class="col-lg-2"><b>Date pause</b></div>
                    <div class="col-lg-1"><b>Etat</b></div>
                    <div class="col-lg-2"><b>Action</b></div>
                    <br>
                    @foreach ($abo as $abonnement)
                        <br>
                        <div class="col-lg-3">{{$abonnement->publication->titre}}</div>
                        <div class="col-lg-2">{{$abonnement->date_debut}}</div>
                        <div class="col-lg-2">{{$abonnement->date_fin}}</div>
                        <div class="col-lg-2">{{$abonnement->date_pause}}</div>
                        <div class="col-lg-1">

                            <?php

                            if($abonnement->etat==1)
                            {
                                echo "En cours";
                            }
                            elseif($abonnement->etat==2)
                            {
                                echo "En pause";
                            }
                            elseif($abonnement->etat==3)
                            {
                                echo "Arrêter";
                            }
                            else
                            {
                                echo "erreur d'affichage";
                            }
                            ?>

                        </div>

                        <div class="col-lg-2">

                        <?php

                        if($abonnement->etat==1)
                        {
                        ?><a href="/arreteraboencours/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Arrêter</u></b></a> |
                            <a href="/pauseaboencours/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Pause</u></b></a>
                            <?php
                        }
                        elseif($abonnement->etat==2)
                        {
                        ?>
                            <a href="/redemarreraboenpause/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Redémarrer</u></b></a> |
                            <a href="/arreteraboenpause/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Arrêter</u></b></a>

                            <?php
                        }
                        elseif($abonnement->etat==3)
                        {
                        ?> <a href="/redemarrerabostopper/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Redémarrer</u></b></a> <?php
                        }
                        else
                        {
                        echo "Pas d'action possible";
                        }
                        ?>
                </div>
                    @endforeach

                </div>
            </div>
        </div>

    @endforeach

@endsection
