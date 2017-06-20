<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonnementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnement', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')/* ->unsigned() */;
            /* $table->foreign('id_client')->references('id')->on('client'); */
            $table->dateTime('date_debut');
            $table->dateTime('date_fin');
            $table->dateTime('date_pause');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonnement');
    }
}
