<?php

namespace AppBundle\Controller;

use AppBundle\Security\Annotation\RequiredAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class MoveController extends Controller
{
    /**
     * Roll with one dice to move.
     *
     * @RequiredAction("move_roll")
     *
     * @return JsonResponse
     */
    public function rollAction()
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $position = $player->getPosition();
        $roll = mt_rand(1, 6);

        $possibleDestinations = $this->get('app.move')->getPossibleDestinationsByRoll($position, $roll);

        $this->get('app.logger')->create($player, 'roll', $roll);

        $player->setAllowedActions(array('move'));
        $em->flush();

        return new JsonResponse(array(
            'roll' => $roll,
            'possible_destinations' => $possibleDestinations,
            'allowed_actions' => $player->getAllowedActions(),
        ));
    }

    /**
     * Move to a specific field.
     *
     * @RequiredAction("move")
     *
     * @param $location
     *
     * @return JsonResponse
     */
    public function toAction($location)
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $position = $player->getPosition();
        $log = $em->getRepository('AppBundle:Log')->findLastRoll($player);
        $roll = $log->getSubjects()[0];

        $possibleDestinations = $this->get('app.move')->getPossibleDestinationsByRoll($position, $roll);

        if (!in_array($location, $possibleDestinations)) {
            throw $this->createNotFoundException();
        }

        $this->get('app.logger')->create($player, 'move', $location);

        $player->setAllowedActions(array('draw_adventure'));
        $player->setPosition($location);
        $em->flush();

        //TODO
        //add location detalis and possible actions

        return new JsonResponse(array(
            'location' => $location,
            'allowed_actions' => $player->getAllowedActions(),
        ));
    }
}
