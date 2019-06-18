<?php

namespace AppBundle\Service;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectRepository;
use Psr\Log\LoggerInterface;

class ClubService
{
    /** @var ManagerRegistry $doctrine */
    protected $doctrine;

    /** @var LoggerInterface $logger */
    protected $logger;

    /** @var ObjectRepository */
    protected $repository;

    /**
     * CollectionService constructor.
     * @param ManagerRegistry $doctrine
     * @param LoggerInterface $logger
     */
    public function __construct(
        ManagerRegistry $doctrine,
        LoggerInterface $logger
    ) {
        $this->doctrine = $doctrine;
        $this->logger = $logger;
        $this->repository = $this->doctrine->getRepository('AppBundle:Club');
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->repository->findAll();
    }
}
