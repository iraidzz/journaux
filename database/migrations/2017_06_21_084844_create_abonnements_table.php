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
            $table->integer('prix');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->date('date_pause')->nullable();
            $table->integer('etat');
            $table->integer('paye')->default(0);
        });

        DB::table('abonnements')->insert(
            array(
                'client_id' => '2',
                'publication_id' => '1',
                'prix' => '85',
                'date_debut' => '2017-07-07',
                'date_fin' => '2018-07-07',
                'date_pause' => '2018-07-07',
                'etat' => '1',
                'paye' => 0,
            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '2',
                'publication_id' => '2',
                'prix' => '45',
                'date_debut' => '2016-11-11',
                'date_fin' => '2017-11-11',
                'date_pause' => '2017-11-11',
                'etat' => '1',
                'paye' => 0,

            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '2',
                'publication_id' => '3',
                'prix' => '101',
                'date_debut' => '2016-08-09',
                'date_fin' => '2017-08-09',
                'date_pause' => '2017-08-09',
                'etat' => '1',
                'paye' => 0,

            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '2',
                'publication_id' => '4',
                'prix' => '50',
                'date_debut' => '2015-07-09',
                'date_fin' => '2016-07-09',
                'date_pause' => '2016-07-09',
                'etat' => '1',
                'paye' => 0,

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
