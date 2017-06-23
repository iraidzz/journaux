<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titre');
            $table->string('nombre_numero');
            $table->string('photo_couverture');
            $table->text('description');
            $table->string('prix_annuel');
            $table->timestamps();
        });

        DB::table('publications')->insert(
            array(
                'titre' => 'Les aventures de D.VA',
                'nombre_numero' => '15',
                'photo_couverture' => 'http://nsa37.casimages.com/img/2017/06/20/170620020849480972.png',
                'description' => 'Le méca de D.Va est aussi agile que puissant : ses fusio-canons jumelés tirent en continu à courte portée, et elle peut activer ses turboréacteurs pour bondir par-dessus ennemis et obstacles, ou abattre les projectiles en plein air avec sa matrice défensive.',
                'prix_annuel' => '85',
            )
        );


        DB::table('publications')->insert(
            array(
                'titre' => 'Montre-moi',
                'nombre_numero' => '11',
                'photo_couverture' => 'http://www.montaigne-publications.com/uploads/magazine/magazine_2.jpg',
                'description' => 'Un homme à dit un jour "Si à 50 ans on n\'a pas une Rolex, c\'est qu\'on a raté sa vie" alors à défaut de ne pas pouvoir t\'acheter de Rolex ... achètes-toi ce magazin ! Il est pas cher en plus.',
                'prix_annuel' => '45',
            )
        );


        DB::table('publications')->insert(
            array(
                'titre' => 'Minato le mino',
                'nombre_numero' => '28',
                'photo_couverture' => 'http://nsa38.casimages.com/img/2017/06/20/17062002323930528.png',
                'description' => 'Lorsque Minato était à l\'Académie, sa camarade de classe Kushina Uzumaki lui trouvait un air de fille avec un visage floconneux et qu\'il avait l\'air « peu fiable ». Néanmoins, il avait pour ambition de devenir Hokage pour être reconnu par les villageois de Konoha. Kushina le prit alors pour un rêveur avec des projets impossibles[...]',
                'prix_annuel' => '101',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Overwatch: le monde à besoin de héros',
                'nombre_numero' => '12',
                'photo_couverture' => 'http://nsa37.casimages.com/img/2017/06/20/170620044955323053.png',
                'description' => 'L\'histoire commece il y a un peu plus de 30 ans (ndlr : environ 2045.) Lorsqu\'Omnica Corporation révolutionna l\'industrie robotique, le monde parut sur le point d\'entrer dans un âge d\'or économique. Les énormes usines d\'Omnica, dotées de machines de construction automatisées et d\'algorithmes intelligents, furent brevetées, vendues sous le nom d\'« Omniums », et installées sur tous les continents.
Les informations ne manquent pas sur ce qu\'il s\'est passé ensuite. Les omniums commencèrent à tomber en panne. Des analyses indépendantes montrèrent qu\'ils ne pourraient jamais s\'approcher des promesses du fabricant en matière de croissance et de rendement. Omnica subit un audit, puis une dissolution forcée après la découverte de preuves de fraudes. Les omniums furent fermés. « peu fiable ». Néanmoins, il avait pour ambition de devenir Hokage pour être reconnu par les villageois de Konoha. Kushina le prit alors pour un rêveur avec des projets impossibles[...]',
                'prix_annuel' => '50',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Entrepreneurs de demain : pour les jeunes',
                'nombre_numero' => '19',
                'photo_couverture' => 'https://assets.entrepreneur.com/content/3x4/600/20160818180019-entrepreneur-magazine-september-2016.jpeg',
                'description' => 'Entreprendre , c\'est comprendre ... Alors entreprenez, et vous comprendez[...]',
                'prix_annuel' => '30',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Entrepreneurs de demain : pour les chauves',
                'nombre_numero' => '45',
                'photo_couverture' => 'https://assets.entrepreneur.com/content/3x4/600/20170103171816-entjanfeb17coverRC.jpeg',
                'description' => 'Entreprendre , c\'est comprendre ... Alors entreprenez, et vous comprendez[...]',
                'prix_annuel' => '110',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Entrepreneurs de demain : pour les hommes et femmes',
                'nombre_numero' => '41',
                'photo_couverture' => 'https://assets.entrepreneur.com/content/3x4/600/20161110235946-entrepreneur-magazine-december-2017.jpeg',
                'description' => 'Entreprendre , c\'est comprendre ... Alors entreprenez, et vous comprendez[...]',
                'prix_annuel' => '200',
            )
        );

        // Génération données bidon
        $i=1;
        while($i<100)
        {
            $numeroPublication = random_int(1,1000);
            $valueNumero = random_int(1,50);
            $valuePrix = random_int(1,200);
            $textAleatoire = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) .  chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
            DB::table('publications')->insert(
                array(
                    'titre' => 'Publication numéro '.$numeroPublication,
                    'nombre_numero' => $valueNumero,
                    'photo_couverture' => $this->getBase64FromPath('http://nsa37.casimages.com/img/2017/06/21/170621091842369749.png'),
                    'description' => $textAleatoire,
                    'prix_annuel' => $valuePrix,
                )
            );
            $i++;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }

    private function getBase64FromPath($img) {
        $image = 'C:\laragon\www\journaux\public\uploads\\'.$img;
        $type = pathinfo($image, PATHINFO_EXTENSION);
        $data = file_get_contents($image);
        $dataUri = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $dataUri;
    }
}
