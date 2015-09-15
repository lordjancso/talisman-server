<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class MoveController extends Controller
{
    public function rollAction()
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $position = $player->getPosition();
        $roll = mt_rand(1, 6);

        $possible_destinations = $this->get('app.move')->getPossibleDestinationsByRoll($position, $roll);

        $player->setLastRoll($roll);
        $em->flush();

        return new JsonResponse(array(
            'roll' => $roll,
            'possible_destinations' => $possible_destinations,
        ));
    }

    public function toAction($location)
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $position = $player->getPosition();
        $roll = $player->getLastRoll();

        $possible_destinations = $this->get('app.move')->getPossibleDestinationsByRoll($position, $roll);

        if (!in_array($location, $possible_destinations)) {
            throw $this->createNotFoundException();
        }

        $player->setPosition($location);
        $em->flush();

        //TODO
        //add location detalis and possible actions

        return new JsonResponse(array(
            'location' => $location,
        ));
    }
}
