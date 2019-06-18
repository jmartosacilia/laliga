<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Club;
use AppBundle\Service\ClubService;
use FOS\RestBundle\Controller\Annotations;
use FOS\RestBundle\Controller\FOSRestController;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ClubController extends FOSRestController
{
    protected $clubService;

    public function __construct(ClubService $clubService)
    {
        $this->clubService = $clubService;
    }

    /**
     * @Annotations\View(serializerGroups={"clubs"})
     * @Annotations\Get("/clubs", name="get_collections", options={ "method_prefix" = false })
     */
    public function getClubs()
    {
        $clubs = $this->clubService->getAll();
        return $this->customResponse($clubs, Club::CLUBS);
    }

    /**
     * @param $entity
     * @param $groups
     * @param $status
     * @return JsonResponse
     */
    protected function customResponse($entity, $groups, $status = Response::HTTP_OK)
    {
        $serializerService = $this->get('jms_serializer');

        $body = $serializerService->serialize($entity, 'json', SerializationContext::create()->setGroups($groups));

        $response = new JsonResponse();
        $response->setContent($body);
        $response->setStatusCode($status);

        return $response;
    }
}
