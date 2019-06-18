<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Club;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ClubFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $clubs = [
            ['name' => 'Alavés', 'slug' => 'alaves'],
            ['name' => 'Athletic', 'slug' => 'athletic'],
            ['name' => 'Atlético', 'slug' => 'atletico' ],
            ['name' => 'Barcelona', 'slug' => 'barcelona'],
            ['name' => 'Betis', 'slug' => 'betis'],
            ['name' => 'Celta', 'slug' => 'celta' ],
            ['name' => 'Eibar', 'slug' => 'eibar'],
            ['name' => 'Espanyol', 'slug' => 'espanyol' ],
            ['name' => 'Getafe', 'slug' => 'getafe' ],
            ['name' => 'Girona', 'slug' => 'girona' ],
            ['name' => 'Huesca', 'slug' => 'huesca'],
            ['name' => 'Leganés', 'slug' => 'leganes' ],
            ['name' => 'Levante', 'slug' => 'levante'],
            ['name' => 'Real Sociedad', 'slug' => 'real-sociedad' ],
            ['name' => 'Rayo', 'slug' => 'rayo'],
            ['name' => 'Real Madrid', 'slug' => 'real-madrid'],
            ['name' => 'Real Valladolid', 'slug' => 'real-valladolid'],
            ['name' => 'Sevilla', 'slug' => 'sevilla'],
            ['name' => 'Valencia', 'slug' => 'valencia'],
            ['name' => 'Villarreal', 'slug' => 'villareal'],
        ];

        foreach ($clubs as $c) {
            $club = new Club();
            $club->setName($c['name']);
            $manager->persist($club);
        }

        $manager->flush();
    }
}
