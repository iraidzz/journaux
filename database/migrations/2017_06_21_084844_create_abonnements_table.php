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
                'date_debut' => '25/04/2017',
                'date_fin' => '25/04/2018',
                'date_pause' => '25/04/2018',
                'etat' => '1',
                'paye' => 0,
            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '2',
                'publication_id' => '2',
                'prix' => '45',
                'date_debut' => '11/11/2016',
                'date_fin' => '11/11/2017',
                'date_pause' => '11/11/2017',
                'etat' => '1',
                'paye' => 0,

            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '2',
                'publication_id' => '3',
                'prix' => '101',
                'date_debut' => '09/08/2016',
                'date_fin' => '09/08/2017',
                'date_pause' => '09/08/2017',
                'etat' => '1',
                'paye' => 0,

            )
        );

        DB::table('abonnements')->insert(
            array(
                'client_id' => '2',
                'publication_id' => '4',
                'prix' => '50',
                'date_debut' => '09/07/2015',
                'date_fin' => '09/07/2015',
                'date_pause' => '09/07/2015',
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
