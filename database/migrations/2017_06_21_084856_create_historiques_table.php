<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historiques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('user_employe_id');
            $table->string('type_communication');
            $table->dateTime('date');
            $table->longText('commentaire');

        });

        DB::table('historiques')->insert(
            array(
                'user_id' => 2,
                'user_employe_id' => 1,
                'type_communication' => 'téléphone',
                'date' => '2016-05-12',
                'commentaire' => 'client relou, à 2 doigt de la tapé via le téléphone OMG O_O',

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
        Schema::dropIfExists('historiques');
    }
}
