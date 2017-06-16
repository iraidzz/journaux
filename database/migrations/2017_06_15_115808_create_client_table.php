<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('civilite');
            $table->string('email')->unique();
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

    DB::table('client')->insert(
        array(
            'nom' => 'arry',
            'prenom' => 'abittan',
            'civilite' => 'M',
            'email' => 'a.abittan@gmail.com',
            'password' => 'azerty123',
            'numero_telephone' => '0666666666',
            'date_naissance' => '12/05/2016',
            'lieu_naissance' => 'Marseille',
            'adresse_domicile' => 'Notre dame de la garde',
            'postal_domicile' => '13001',
            'ville_domicile' => 'Marseille',
            )
        );

        DB::table('client')->insert(
            array(
                'nom' => 'bg',
                'prenom' => 'vincent',
                'civilite' => 'M',
                'email' => 'b.vincent@gmail.com',
                'password' => 'azerty123',
                'numero_telephone' => '0666666666',
                'date_naissance' => '12/05/2016',
                'lieu_naissance' => 'Avignon',
                'adresse_domicile' => 'grillon pas très brave',
                'postal_domicile' => '00666',
                'ville_domicile' => 'grillon',
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
        Schema::dropIfExists('client');

    }
}
