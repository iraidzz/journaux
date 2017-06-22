<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            //partie client
            $table->string('prenom')->nullable();
            $table->string('civilite')->nullable();
            $table->string('numero_telephone')->nullable();
            $table->dateTime('date_naissance')->nullable();
            $table->string('lieu_naissance')->nullable();
            $table->string('adresse_domicile')->nullable();
            $table->string('postal_domicile')->nullable();
            $table->string('ville_domicile')->nullable();
        });



        DB::table('users')->insert(
            array(
                'name' => 'employe',
                'email' => 'employe@gmail.com',
                'password' =>  bcrypt('employe'),
            )
        );


        DB::table('users')->insert(
            array(
                'name' => 'client1',
                'email' => 'client1@gmail.com',
                'password' =>  bcrypt('client1'),
                'prenom' => 'Loick',
                'civilite' => 'MR',
                'numero_telephone' => '0628496711',
                'date_naissance' => '09/02/1994',
                'lieu_naissance' => 'Marseille',
                'adresse_domicile' => 'Notre dame de la garde',
                'postal_domicile' => '13010',
                'ville_domicile' => 'Marseille',
            )
        );


        DB::table('users')->insert(
            array(
                'name' => 'client2',
                'email' => 'client2@gmail.com',
                'password' =>  bcrypt('client2'),
                'prenom' => 'Vincent',
                'civilite' => 'MR',
                'numero_telephone' => '0666496855',
                'date_naissance' => '01/06/1993',
                'lieu_naissance' => 'Carpentras',
                'adresse_domicile' => '401B Chemin des carrieres',
                'postal_domicile' => '84410',
                'ville_domicile' => 'Crillon le pas brave',
            )
        );


        DB::table('users')->insert(
            array(
                'name' => 'client3',
                'email' => 'client3@gmail.com',
                'password' =>  bcrypt('clientfemelle'),
                'prenom' => 'client3',
                'civilite' => 'MME',
                'numero_telephone' => '0628496711',
                'date_naissance' => '09/02/1994',
                'lieu_naissance' => 'Marseille',
                'adresse_domicile' => 'Notre dame de la garde',
                'postal_domicile' => '13010',
                'ville_domicile' => 'Marseille',
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'employe2',
                'email' => 'employe2@gmail.com',
                'password' =>  bcrypt('employe2'),
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
        Schema::dropIfExists('users');
    }
}
