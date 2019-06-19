<?php

namespace AppBundle\Service;

use AppBundle\Entity\Club;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectRepository;

class ClubService
{
    /** @var ManagerRegistry $doctrine */
    protected $doctrine;

    /** @var ObjectRepository */
    protected $repository;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->repository = $this->doctrine->getRepository(Club::class);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }
}
