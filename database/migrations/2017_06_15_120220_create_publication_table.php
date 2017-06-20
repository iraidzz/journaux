<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('nombre_numero');
            $table->string('photo_couverture');
            $table->text('description');
            $table->string('prix_annuel');
            $table->timestamps();
        });

        DB::table('publication')->insert(
            array(
                'titre' => 'Les aventures de D.VA',
                'nombre_numero' => '15',
                'photo_couverture' => 'http://nsa37.casimages.com/img/2017/06/20/170620020849480972.png',
                'description' => 'Le méca de D.Va est aussi agile que puissant : ses fusio-canons jumelés tirent en continu à courte portée, et elle peut activer ses turboréacteurs pour bondir par-dessus ennemis et obstacles, ou abattre les projectiles en plein air avec sa matrice défensive.',
                'prix_annuel' => '85',
            )
        );


        DB::table('publication')->insert(
            array(
                'titre' => 'Montre-moi',
                'nombre_numero' => '11',
                'photo_couverture' => 'http://www.montaigne-publications.com/uploads/magazine/magazine_2.jpg',
                'description' => 'Un homme à dit un jour "Si à 50 ans on n\'a pas une Rolex, c\'est qu\'on a raté sa vie" alors à défaut de ne pas pouvoir t\'acheter de Rolex ... achètes-toi ce magazin ! Il est pas cher en plus.',
                'prix_annuel' => '45',
            )
        );


        DB::table('publication')->insert(
            array(
                'titre' => 'Minato le mino',
                'nombre_numero' => '28',
                'photo_couverture' => 'http://nsa38.casimages.com/img/2017/06/20/17062002323930528.png',
                'description' => 'Lorsque Minato était à l\'Académie, sa camarade de classe Kushina Uzumaki lui trouvait un air de fille avec un visage floconneux et qu\'il avait l\'air « peu fiable ». Néanmoins, il avait pour ambition de devenir Hokage pour être reconnu par les villageois de Konoha. Kushina le prit alors pour un rêveur avec des projets impossibles[...]',
                'prix_annuel' => '101',
            )
        );

    }

    // Ajout de données de test



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication');
    }
}
