<?php

namespace AppBundle\Service;

use AppBundle\Entity\Club;
use AppBundle\Entity\Player;
use Doctrine\Common\Persistence\ManagerRegistry;

class PlayerService
{
    /** @var ManagerRegistry $doctrine */
    protected $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function addPlayer(Club $club, Player $player)
    {
        $player->setClub($club);

        $this->doctrine->getManager()->persist($player);
        $this->doctrine->getManager()->flush();

        return $player;
    }
}
