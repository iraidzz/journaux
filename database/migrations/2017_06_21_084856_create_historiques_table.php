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
                'type_communication' => 'Téléphone',
                'date' => '2017-01-01',
                'commentaire' => 'Enregistrement test 1',

            )
        );

        DB::table('historiques')->insert(
            array(
                'user_id' => 3,
                'user_employe_id' => 5,
                'type_communication' => 'Courrier',
                'date' => '2016-08-12',
                'commentaire' => 'Enregistrement test 2',

            )
        );


        DB::table('historiques')->insert(
            array(
                'user_id' => 4,
                'user_employe_id' => 1,
                'type_communication' => 'téléphone',
                'date' => '2016-05-12',
                'commentaire' => 'Enregistrement test 3',

            )
        );

        DB::table('historiques')->insert(
            array(
                'user_id' => 2,
                'user_employe_id' => 5,
                'type_communication' => 'Email',
                'date' => '2016-06-12',
                'commentaire' => 'Enregistrement test 4',

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
