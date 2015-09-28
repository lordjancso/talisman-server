<?php

namespace AppBundle\Controller;

use AppBundle\Security\Annotation\RequiredAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class TakeController extends Controller
{
    /**
     * Take a follower type adventure card.
     *
     * @RequiredAction("take_follower")
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function followerAction($id)
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $log = $em->getRepository('AppBundle:Log')->findLastDrawnAdventureCard($player);

        if (!in_array($id, $log->getSubjects())) {
            throw $this->createNotFoundException();
        }

        $card = $em->getRepository('AppBundle:AdventureCard')->find($id);

        //TODO
        //take follower card

        $player->setAllowedActions(array('turn_end'));
        $em->flush();

        return new JsonResponse(array('turn_end'));
    }
}
