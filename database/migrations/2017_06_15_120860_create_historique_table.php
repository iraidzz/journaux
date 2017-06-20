<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historique', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('client');
            $table->integer('id_employe')->unsigned();
            $table->foreign('id_employe')->references('id')->on('employe');
           /* $table->integer('id_communication')->unsigned();
            $table->foreign('id_communication')->references('id')->on('communication');*/
            $table->string('type_communication');
            $table->dateTime('date');
            $table->longText('commentaire');

        });

        DB::table('historique')->insert(
            array(
                'id_client' => '1',
                'id_employe' => '2',
                'type_communication' => 'téléphone',
                'date' => '2016-05-12',
                'commentaire' => 'client relou',

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
        Schema::dropIfExists('historique');

    }
}
