<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('civilite');
            $table->string('email');
            $table->string('password');
            $table->string('numero_telephone');
            $table->dateTime('date_naissance');
            $table->string('lieu_naissance');
            $table->string('adresse_domicile');
            $table->string('postal_domicile');
            $table->string('ville_domicile');
        });

        /**
         * Insertion de données à la création des tables
         */

        DB::table('clients')->insert(
            array(
                'nom' => 'BUR  ',
                'prenom' => 'Loick',
                'civilite' => 'MR',
                'email' => 'loick.bur@gmail.com',
                'password' => 'jesuisbeaugoss',
                'numero_telephone' => '0628496711',
                'date_naissance' => '09/02/1994',
                'lieu_naissance' => 'Marseille',
                'adresse_domicile' => 'Notre dame de la garde',
                'postal_domicile' => '13001',
                'ville_domicile' => 'Marseille',
            )
        );

        DB::table('clients')->insert(
            array(
                'nom' => 'GIRARD',
                'prenom' => 'Vincent',
                'civilite' => 'MR',
                'email' => 'girvincent@gmail.com',
                'password' => 'azerty123',
                'numero_telephone' => '0666496855',
                'date_naissance' => '01/06/1993',
                'lieu_naissance' => 'Carpentras',
                'adresse_domicile' => '401B Chemin des carrieres',
                'postal_domicile' => '84410',
                'ville_domicile' => 'Crillon le brave',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
