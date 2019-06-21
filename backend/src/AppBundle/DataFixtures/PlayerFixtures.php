<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Club;
use AppBundle\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $players = [
            // alaves
            ['name' => 'Pacheco', 'club' => 'alaves', 'dorsal' => 1],
            ['name' => 'Laguardia', 'club' => 'alaves', 'dorsal' => 5],
            ['name' => 'Burgui', 'club' => 'alaves', 'dorsal' => 14],
            ['name' => 'Inui', 'club' => 'alaves', 'dorsal' => 30],
            ['name' => 'Patrick Twumasi', 'club' => 'alaves', 'dorsal' => 24],
            // athletic
            ['name' => 'Remiro', 'club' => 'athletic', 'dorsal' => 1],
            ['name' => 'Yeray', 'club' => 'athletic', 'dorsal' => 5],
            ['name' => 'San José', 'club' => 'athletic', 'dorsal' => 6],
            ['name' => 'Mikel Rixo', 'club' => 'athletic', 'dorsal' => 17],
            ['name' => 'Williams', 'club' => 'athletic', 'dorsal' => 9],
            // atletico
            ['name' => 'Adán', 'club' => 'atletico', 'dorsal' => 1],
            ['name' => 'Savic', 'club' => 'atletico', 'dorsal' => 15],
            ['name' => 'Alberto Rodríguez', 'club' => 'atletico', 'dorsal' => 36],
            ['name' => 'Lemar', 'club' => 'atletico', 'dorsal' => 11],
            ['name' => 'Griezmann', 'club' => 'atletico', 'dorsal' => 7],
            // barcelona
            ['name' => 'Ter Stegen', 'club' => 'barcelona', 'dorsal' => 1],
            ['name' => 'Alba', 'club' => 'barcelona', 'dorsal' => 18],
            ['name' => 'Vermaelen', 'club' => 'barcelona', 'dorsal' => 24],
            ['name' => 'Rakitic', 'club' => 'barcelona', 'dorsal' => 4],
            ['name' => 'Vidal', 'club' => 'barcelona', 'dorsal' => 22],
            // betis
            ['name' => 'Joel', 'club' => 'betis', 'dorsal' => 1],
            ['name' => 'Mandi', 'club' => 'betis', 'dorsal' => 23],
            ['name' => 'Canales', 'club' => 'betis', 'dorsal' => 6],
            ['name' => 'Joaquin', 'club' => 'betis', 'dorsal' => 17],
            ['name' => 'Jesé', 'club' => 'betis', 'dorsal' => 10],
            // celta
            ['name' => 'Sergio Álvarez', 'club' => 'celta', 'dorsal' => 1],
            ['name' => 'Olaza', 'club' => 'celta', 'dorsal' => 15],
            ['name' => 'Radoja', 'club' => 'celta', 'dorsal' => 8],
            ['name' => 'Aspas', 'club' => 'celta', 'dorsal' => 10],
            ['name' => 'Jozabed', 'club' => 'celta', 'dorsal' => 21],
            // eibar
            ['name' => 'Dmitrovic', 'club' => 'eibar', 'dorsal' => 1],
            ['name' => 'Arbilla', 'club' => 'eibar', 'dorsal' => 23],
            ['name' => 'Escalante', 'club' => 'eibar', 'dorsal' => 5],
            ['name' => 'Orellana', 'club' => 'eibar', 'dorsal' => 14],
            ['name' => 'Charles', 'club' => 'eibar', 'dorsal' => 19],
            // espanyol
            ['name' => 'Roberto', 'club' => 'espanyol', 'dorsal' => 1],
            ['name' => 'Naldo', 'club' => 'espanyol', 'dorsal' => 5],
            ['name' => 'Wu Lei', 'club' => 'espanyol', 'dorsal' => 24],
            ['name' => 'Piatti', 'club' => 'espanyol', 'dorsal' => 19],
            ['name' => 'Granero', 'club' => 'espanyol', 'dorsal' => 23],
            // getafe
            ['name' => 'Chichizola', 'club' => 'getafe', 'dorsal' => 1],
            ['name' => 'Antunes', 'club' => 'getafe', 'dorsal' => 3],
            ['name' => 'Cabrera', 'club' => 'getafe', 'dorsal' => 6],
            ['name' => 'Portillo', 'club' => 'getafe', 'dorsal' => 8],
            ['name' => 'Mata', 'club' => 'getafe', 'dorsal' => 7],
            // girona
            ['name' => 'Iraizoz', 'club' => 'girona', 'dorsal' => 1],
            ['name' => 'Bernardo', 'club' => 'girona', 'dorsal' => 2],
            ['name' => 'Pere Pons', 'club' => 'girona', 'dorsal' => 8],
            ['name' => 'Aday', 'club' => 'girona', 'dorsal' => 11],
            ['name' => 'Stuani', 'club' => 'girona', 'dorsal' => 7],
            // huesca
            ['name' => 'Santamaria', 'club' => 'huesca', 'dorsal' => 1],
            ['name' => 'Insúa', 'club' => 'huesca', 'dorsal' => 18],
            ['name' => 'Miramón', 'club' => 'huesca', 'dorsal' => 24],
            ['name' => 'Ferreiro', 'club' => 'huesca', 'dorsal' => 7],
            ['name' => 'Musto', 'club' => 'huesca', 'dorsal' => 23],
            // leganes
            ['name' => 'Pichu', 'club' => 'leganes', 'dorsal' => 1],
            ['name' => 'Nyom', 'club' => 'leganes', 'dorsal' => 12],
            ['name' => 'Recio', 'club' => 'leganes', 'dorsal' => 8],
            ['name' => 'Vesga', 'club' => 'leganes', 'dorsal' => 23],
            ['name' => 'Arnáiz', 'club' => 'leganes', 'dorsal' => 16],
            // levante
            ['name' => 'Koke', 'club' => 'levante', 'dorsal' => 1],
            ['name' => 'Coke', 'club' => 'levante', 'dorsal' => 12],
            ['name' => 'Morales', 'club' => 'levante', 'dorsal' => 11],
            ['name' => 'Mayoral', 'club' => 'levante', 'dorsal' => 2],
            ['name' => 'Jason', 'club' => 'levante', 'dorsal' => 23],
            // real-sociedad
            ['name' => 'Rulli', 'club' => 'real-sociedad', 'dorsal' => 1],
            ['name' => 'Gorosabel', 'club' => 'real-sociedad', 'dorsal' => 18],
            ['name' => 'Merino', 'club' => 'real-sociedad', 'dorsal' => 8],
            ['name' => 'Zurutuza', 'club' => 'real-sociedad', 'dorsal' => 17],
            ['name' => 'Juanmi', 'club' => 'real-sociedad', 'dorsal' => 7],
            // rayo
            ['name' => 'Alberto', 'club' => 'rayo', 'dorsal' => 1],
            ['name' => 'Gálvez', 'club' => 'rayo', 'dorsal' => 23],
            ['name' => 'León', 'club' => 'rayo', 'dorsal' => 26],
            ['name' => 'Jose Pozo', 'club' => 'rayo', 'dorsal' => 22],
            ['name' => 'Embarba', 'club' => 'rayo', 'dorsal' => 11],
            // real-madrid
            ['name' => 'Keylor Navas', 'club' => 'real-madrid', 'dorsal' => 1],
            ['name' => 'Nacho', 'club' => 'real-madrid', 'dorsal' => 6],
            ['name' => 'Kroos', 'club' => 'real-madrid', 'dorsal' => 8],
            ['name' => 'Marco Asensio', 'club' => 'real-madrid', 'dorsal' => 20],
            ['name' => 'Isco', 'club' => 'real-madrid', 'dorsal' => 22],
            // real-valladolid
            ['name' => 'Masip', 'club' => 'real-valladolid', 'dorsal' => 1],
            ['name' => 'Luismi', 'club' => 'real-valladolid', 'dorsal' => 6],
            ['name' => 'Toni Villa', 'club' => 'real-valladolid', 'dorsal' => 19],
            ['name' => 'Anuar', 'club' => 'real-valladolid', 'dorsal' => 23],
            ['name' => 'Cop', 'club' => 'real-valladolid', 'dorsal' => 20],
            // sevilla
            ['name' => 'Vaclik', 'club' => 'sevilla', 'dorsal' => 1],
            ['name' => 'Escudero', 'club' => 'sevilla', 'dorsal' => 18],
            ['name' => 'Mercado', 'club' => 'sevilla', 'dorsal' => 25],
            ['name' => 'Amadou', 'club' => 'sevilla', 'dorsal' => 5],
            ['name' => 'Nolito', 'club' => 'sevilla', 'dorsal' => 8],
            // valencia
            ['name' => 'Jaume', 'club' => 'valencia', 'dorsal' => 1],
            ['name' => 'Garay', 'club' => 'valencia', 'dorsal' => 24],
            ['name' => 'Wass', 'club' => 'valencia', 'dorsal' => 18],
            ['name' => 'Parejo', 'club' => 'valencia', 'dorsal' => 10],
            ['name' => 'Gameiro', 'club' => 'valencia', 'dorsal' => 9],
            // villareal
            ['name' => 'Asenjo', 'club' => 'villareal', 'dorsal' => 1],
            ['name' => 'Iborra', 'club' => 'villareal', 'dorsal' => 10],
            ['name' => 'Bruno', 'club' => 'villareal', 'dorsal' => 21],
            ['name' => 'Cazorla', 'club' => 'villareal', 'dorsal' => 19],
            ['name' => 'Raba', 'club' => 'villareal', 'dorsal' => 22],
        ];

        foreach ($players as $p) {
            $player = new Player();
            $player->setName($p['name']);
            $player->setDorsal($p['dorsal']);
            /** @var Club $club */
            $club = $this->getReference($p['club']);
            $player->setClub($club);
            $manager->persist($player);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ClubFixtures::class,
        );
    }
}
