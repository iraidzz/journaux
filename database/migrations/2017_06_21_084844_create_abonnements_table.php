<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id');
            $table->integer('publication_id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->date('date_pause');
            $table->integer('etat');
        });

        DB::table('abonnements')->insert(
            array(
                'client_id' => '1',
                'publication_id' => '1',
                'date_debut' => '25/04/2017',
                'date_fin' => '25/04/2018',
                'date_pause' => '25/04/2018',
                'etat' => '1',
            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '1',
                'publication_id' => '2',
                'date_debut' => '11/11/2016',
                'date_fin' => '11/11/2017',
                'date_pause' => '11/11/2017',
                'etat' => '1',
            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '1',
                'publication_id' => '3',
                'date_debut' => '09/07/2016',
                'date_fin' => '09/07/2017',
                'date_pause' => '09/07/2017',
                'etat' => '1',
            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '1',
                'publication_id' => '4',
                'date_debut' => '09/07/2015',
                'date_fin' => '09/07/2015',
                'date_pause' => '09/07/2015',
                'etat' => '1',
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
        Schema::dropIfExists('abonnements');
    }
}
