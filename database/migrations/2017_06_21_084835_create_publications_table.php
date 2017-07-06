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
            $table->text('photo_couverture');
            $table->text('description');
            $table->string('prix_annuel');
            $table->timestamps();
        });

        DB::table('publications')->insert(
            array(
                'titre' => 'Cosmopol',
                'nombre_numero' => '24',
                'photo_couverture' => $this->getBase64FromPath('mode2.jpg'),
                'description' => "Alors que Nicole Kidman pose topless en couverture du V Magazine de septembre, tour d'horizon des couvertures des magazines de mode, qui présentent les tendances automne-hiver 2012-2013.
                                    Nicole Kidman pour V Magazine, Lady Gaga pour Vogue US, Katy Perry pour Elle UK, Victoria Beckham pour Glamour, Miley Cyrus pour Marie Claire, Nicole Scherzinger pour Cosmopolitan, Claire Danes pour GQ, Gwen Stefani pour Harper's Bazaar... Les magazines de mode dévoilent les couvertures de leur numéro de rentrée, le fameux \"September Issue\", qui présente les tendances automne-hiver 2012-2013",
                'prix_annuel' => '49',
            )
        );


        DB::table('publications')->insert(
            array(
                'titre' => 'Montre-moi',
                'nombre_numero' => '11',
                'photo_couverture' => $this->getBase64FromPath('magazine_2.jpg'),
                'description' => 'Un homme à dit un jour "Si à 50 ans on n\'a pas une Rolex, c\'est qu\'on a raté sa vie" alors à défaut de ne pas pouvoir t\'acheter de Rolex ... achètes-toi ce magazin ! Il est pas cher en plus.',
                'prix_annuel' => '45',
            )
        );


        DB::table('publications')->insert(
            array(
                'titre' => 'Tennis',
                'nombre_numero' => '36',
                'photo_couverture' => $this->getBase64FromPath('tennis.jpg'),
                'description' => "Au hasard des compétitions, il arrive que des rencontres sportives tournent littéralement à la tripotée. Comment les perdants surmontent-ils l'épreuve de l'humiliation? Nous avons menée l'enquête auprès d'hommes battus et abattus.",
                'prix_annuel' => '64',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => "L'officiel",
                'nombre_numero' => '12',
                'photo_couverture' => $this->getBase64FromPath('lofficiel.jpg'),
                'description' => "Il fait beau, il fait chaud. Sortons les maillots, rangeons les robes longues [...]",
                'prix_annuel' => '50',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Entrepreneurs de demain : pour les jeunes',
                'nombre_numero' => '19',
                'photo_couverture' => $this->getBase64FromPath('20160818180019-entrepreneur-magazine-september-2016.png'),
                'description' => 'Entreprendre , c\'est comprendre ... Alors entreprenez, et vous comprendez[...]',
                'prix_annuel' => '30',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Entrepreneurs de demain : pour les chauves',
                'nombre_numero' => '45',
                'photo_couverture' => $this->getBase64FromPath('20170103171816-entjanfeb17coverRC.png'),
                'description' => 'Entreprendre , c\'est comprendre ... Alors entreprenez, et vous comprendez[...]',
                'prix_annuel' => '110',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Entrepreneurs de demain : pour les hommes et femmes',
                'nombre_numero' => '41',
                'photo_couverture' => $this->getBase64FromPath('azybb.png'),
                'description' => 'Entreprendre , c\'est comprendre ... Alors entreprenez, et vous comprendez[...]',
                'prix_annuel' => '200',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Entrepreneurs de demain : pour les jeunes',
                'nombre_numero' => '42',
                'photo_couverture' => $this->getBase64FromPath('20160818180019-entrepreneur-magazine-september-2016.png'),
                'description' => "Zlatan Ibrahimović (prononcé [ˈslaː.tan ɪ.bra.ˈhiː.mɔ.vɪtʂ] en suédois, [ˈzla.tan i.bra.ˈxiː.mɔ.ʋitɕ] en bosnien) est un footballeur international suédois, né le 3 octobre 1981 à Malmö.

Il est considéré comme l'un des avants-centres le plus complets au monde et considéré comme l'un des meilleurs joueurs suédois de l'histoire du football3,4,5.

Zlatan Ibrahimović a la particularité d'avoir remporté le titre de champion dans quatre championnats différents : aux Pays-Bas avec l'Ajax Amsterdam, en Italie avec l'Inter de Milan et le Milan AC, en Espagne avec le FC Barcelone puis en France avec le Paris Saint-Germain. Avant l'affaire des matchs truqués du Calcio et les deux titres retirés à la Juventus de Turin, il avait remporté le championnat dans tous ses clubs depuis 2002, dont huit consécutivement, de 2004 à 2011.

À l'inverse, son bilan en coupes d'Europe est beaucoup plus mitigé : bien qu'il participe à plusieurs campagnes européennes avec ses clubs successifs, il n’atteint jamais la finale de la Ligue des champions. Il remporte néanmoins 3 titres internationaux: La Supercoupe de l'UEFA et la Coupe du monde des clubs de la FIFA avec Barcelone en 2009 ainsi que la Ligue Europa avec Manchester United en 2017 malgré une blessure au genou l'empêchant de participer à la finale dans son pays natal.
",
                'prix_annuel' => '99',
            )
        );

        DB::table('publications')->insert(
            array(
                'titre' => 'Mariabir',
                'nombre_numero' => '12',
                'photo_couverture' => $this->getBase64FromPath('mode1.jpg'),
                'description' => "Encore et toujours la mode. On ne passera pas à travers. Ce magazine vous donnera les dernieres tendance de l'année.",
                'prix_annuel' => '36',
            )
        );

        // Génération données bidon
        $i=1;
        while($i<5)
        {
            $numeroPublication = random_int(1,500);
            $valueNumero = random_int(1,50);
            $valuePrix = random_int(1,100);
            $textAleatoire = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) .  chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
            DB::table('publications')->insert(
                array(
                    'titre' => 'Enregistrement de test '.$numeroPublication,
                    'nombre_numero' => $valueNumero,
                    'photo_couverture' => $this->getBase64FromPath('NiFound.png'),
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
