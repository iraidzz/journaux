@extends('layouts.template')
@section('content')

    @foreach ($client as $patate)
        <div class="container">


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">

                        <div class="panel-heading"><b>MODIFIER UN CLIENT</b></div>
                        <div class="panel-body">
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
                        </div>
                    </div>


                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>HISTORIQUE DU CLIENT</b></div>
                        <br>
                        <div class="row">

                            <div class="col-lg-12 text-center"><a
                                        href="/displayajouthistoriqueclient/{{ $patate-> id }}"><b><u>Ajouter un historique</u></b></a></div>

                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Employe</th>
                                    <th>Moyen de communication</th>
                                    <th>Date</th>
                                    <th>Commentaire</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach ($histo as $historique)
                                    <tr>
                                        <td>{{  $historique-> user -> name }}</td>
                                        <td>{{  $historique-> user_employe -> name }}</td>
                                        <td>{{  $historique->type_communication }}</td>
                                        <td>{{  $historique->date }}</td>
                                        <td>{{  $historique->commentaire }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><b>ABONNEMENT DU CLIENT</b></div><br>
                        <div class="col-lg-12 text-center">
                            <a href="/displayajoutabonnement/{{ $patate-> id }}"><b><u>Ajouter un abonnement</u></b></a>
                        </div>
                        <br>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Magazine</th>
                                    <th>Prix</th>
                                    <th>Date abonnement</th>
                                    <th>Date fin</th>
                                    <th>Date pause</th>
                                    <th>Etat</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($abo as $abonnement)
                                    <tr>
                                        <td>{{$abonnement->publication->titre}}</td>
                                        <td>{{$abonnement->prix}}€</td>
                                        <td>{{$abonnement->date_debut}}</td>
                                        <td>{{$abonnement->date_fin}}</td>
                                        <td>{{$abonnement->date_pause}}</td>
                                        <td>  <?php

                                            if ($abonnement->etat == 1) {
                                                echo "En cours";
                                            } elseif ($abonnement->etat == 2) {
                                                echo "En pause";
                                            } elseif ($abonnement->etat == 3) {
                                                echo "Arrêter";
                                            } else {
                                                echo "erreur d'affichage";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php

                                            if($abonnement->etat == 1)
                                            {
                                            ?>
                                            <a href="/arreteraboencours/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Arrêter</u></b></a>
                                            |
                                            <a href="/pauseaboencours/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Pause</u></b></a>
                                            <?php
                                            }
                                            elseif($abonnement->etat == 2)
                                            {
                                            ?>
                                            <a href="/redemarreraboenpause/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Redémarrer</u></b></a>
                                            |
                                            <a href="/arreteraboenpause/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Arrêter</u></b></a>

                                            <?php
                                            }
                                            elseif($abonnement->etat == 3)
                                            {
                                            ?> <a href="/redemarrerabostopper/{{ $abonnement-> id }}/{{ $patate-> id }}"><b><u>Redémarrer</u></b></a> <?php
                                            }
                                            else {
                                                echo "Pas d'action possible";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    @endforeach

@endsection
