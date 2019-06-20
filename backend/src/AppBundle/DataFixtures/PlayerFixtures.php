<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $players = [
            ['name' => 'Pacheco', 'club' => 'alaves', 'dorsal' => 1],
            ['name' => 'Laguardia', 'club' => 'alaves', 'dorsal' => 5],
            ['name' => 'Burgui', 'club' => 'alaves', 'dorsal' => 14],
            ['name' => 'Inui', 'club' => 'alaves', 'dorsal' => 30],
            ['name' => 'Patrick Twumasi', 'club' => 'alaves', 'dorsal' => 24],
        ];

        foreach ($players as $p) {
            $player = new Player();
            $player->setName($p['name']);
            $player->setDorsal($p['dorsal']);
            $player->setClub($this->getReference($p['club']));
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
