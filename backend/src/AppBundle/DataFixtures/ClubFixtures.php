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
            ['name' => 'Villarreal', 'slug' => 'villareal'],
            ['name' => 'Leganés', 'slug' => 'leganes' ],
            ['name' => 'Athletic', 'slug' => 'athletic'],
            ['name' => 'Eibar', 'slug' => 'eibar'],
            ['name' => 'Girona', 'slug' => 'girona' ],
            ['name' => 'Real Madrid', 'slug' => 'real-madrid'],
            ['name' => 'Betis', 'slug' => 'betis'],
            ['name' => 'Celta', 'slug' => 'celta' ],
            ['name' => 'Levante', 'slug' => 'levante'],
            ['name' => 'Espanyol', 'slug' => 'espanyol' ],
            ['name' => 'Getafe', 'slug' => 'getafe' ],
            ['name' => 'Huesca', 'slug' => 'huesca'],
            ['name' => 'Barcelona', 'slug' => 'barcelona'],
            ['name' => 'Real Sociedad', 'slug' => 'real-sociedad' ],
            ['name' => 'Rayo', 'slug' => 'rayo'],
            ['name' => 'Real Valladolid', 'slug' => 'real-valladolid'],
            ['name' => 'Atlético', 'slug' => 'atletico' ],
            ['name' => 'Sevilla', 'slug' => 'sevilla'],
            ['name' => 'Valencia', 'slug' => 'valencia'],
            ['name' => 'Alavés', 'slug' => 'alaves'],
        ];

        foreach ($clubs as $c) {
            $club = new Club();
            $club->setName($c['name']);
            $club->setSlug($c['slug']);
            $manager->persist($club);

            $this->addReference($c['slug'], $club);
        }

        $manager->flush();
    }
}
