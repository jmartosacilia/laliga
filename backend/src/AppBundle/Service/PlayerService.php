<?php

namespace AppBundle\Service;

use AppBundle\Entity\Club;
use AppBundle\Entity\Player;
use AppBundle\Repository\PlayerRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class PlayerService
{
    /** @var ManagerRegistry $doctrine */
    protected $doctrine;

    /** @var PlayerRepository $playerRepository */
    protected $repository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->repository = $this->doctrine->getRepository(Player::class);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }

    /**
     * Add player
     * @param Club $club
     * @param Player $player
     * @return Player
     */
    public function addPlayer(Club $club, Player $player)
    {
        $player->setClub($club);

        $this->doctrine->getManager()->persist($player);
        $this->doctrine->getManager()->flush();

        return $player;
    }
}
