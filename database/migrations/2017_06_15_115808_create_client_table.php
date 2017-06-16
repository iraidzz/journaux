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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
