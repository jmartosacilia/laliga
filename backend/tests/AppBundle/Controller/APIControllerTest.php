<?php

namespace Tests\AppBundle\Controller;

use AppBundle\Entity\Club;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class APIControllerTest extends WebTestCase
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testClubs()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/api/v1/clubs');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testPlayers()
    {
        /** @var Club $club */
        $club = $this->getClubBySlug('alaves');

        $client = static::createClient();

        $uri = sprintf('/api/v1/clubs/%s/players', $club->getId());

        $crawler = $client->request('GET', $uri);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testPlayers404()
    {
        $client = static::createClient();

        $uri = sprintf('/api/v1/clubs/%s/players', 0);

        $crawler = $client->request('GET', $uri);

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testNewPlayer()
    {
        /** @var Club $club */
        $club = $this->getClubBySlug('alaves');

        $data = [
            'name' => 'Cavani',
            'dorsal' => 21,
        ];

        $uri = sprintf('/api/v1/clubs/%s/players', $club->getId());

        $client = static::createClient();

        $crawler = $client->request('POST', $uri, $data);

        $this->assertEquals(201, $client->getResponse()->getStatusCode());
    }

    public function testNewPlayer404()
    {
        $data = [
            'name' => 'Cavani',
            'dorsal' => 21,
        ];

        $uri = sprintf('/api/v1/clubs/%s/players', 0);

        $client = static::createClient();

        $crawler = $client->request('POST', $uri, $data);

        $this->assertEquals(404, $client->getResponse()->getStatusCode());
    }

    public function testNewPlayer400()
    {
        /** @var Club $club */
        $club = $this->getClubBySlug('alaves');

        $data = [
            'name' => 'Cavani',
        ];

        $uri = sprintf('/api/v1/clubs/%s/players', $club->getId());

        $client = static::createClient();

        $crawler = $client->request('POST', $uri, $data);

        var_dump($client->getResponse()->getContent());

        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    protected function getClubBySlug($slug)
    {
        $clubRepository = $this->entityManager->getRepository(Club::class);

        $club = $clubRepository->findOneBySlug($slug);

        return $club;
    }
}
