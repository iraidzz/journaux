<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');

        });

        DB::table('employes')->insert(
            array(
                'nom' => 'employe',
                'prenom' => 'test',
                'email' => 'employe@gmail.com',
                'password' => 'employe',
            )
        );

        DB::table('employes')->insert(
            array(
                'nom' => 'test',
                'prenom' => 'test',
                'email' => 'test@gmail.com',
                'password' => 'test',
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
        Schema::dropIfExists('employes');
    }
}
