<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Club;
use AppBundle\Entity\Player;
use AppBundle\Form\PlayerType;
use AppBundle\Service\ClubService;
use AppBundle\Service\PlayerService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class APIController extends AbstractFOSRestController
{
    /** @var ClubService $clubService */
    protected $clubService;

    /** @var PlayerService $playerService */
    protected $playerService;

    public function __construct(ClubService $clubService, PlayerService $playerService)
    {
        $this->clubService = $clubService;
        $this->playerService = $playerService;
    }

    /**
     * Get Clubs
     * @Rest\Get("/clubs")
     * @Rest\View(serializerGroups={Club::CLUBS})
     * @return View
     */
    public function getClubs()
    {
        $clubs = $this->clubService->getAll();
        return View::create($clubs, Response::HTTP_OK);
    }

    /**
     * Get Players
     * @Rest\Get("/clubs/{club}/players")
     * @Rest\View(serializerGroups={Player::PLAYERS})
     */
    public function getPlayers(Club $club)
    {
        $players = $club->getPlayers();
        return View::create($players, Response::HTTP_OK);
    }

    /**
     * Creates an Player resource
     * @Rest\Post("/clubs/{club}/players")
     * @Rest\View(serializerGroups={Player::PLAYERS})
     */
    public function postPlayer(Request $request, Club $club)
    {
        $player = new Player();

        $form = $this->createForm(PlayerType::class, $player);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $player = $this->playerService->addPlayer(
                $club,
                $player
            );

            return View::create($player, Response::HTTP_CREATED);
        } else {
            return View::create($form);
        }
    }
}
