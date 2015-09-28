<?php

namespace AppBundle\Controller;

use AppBundle\Security\Annotation\RequiredAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class TurnController extends Controller
{
    /**
     * Player gives up current turn.
     *
     * @RequiredAction("turn_end")
     *
     * @return JsonResponse
     */
    public function endAction()
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        //TODO
        //switch to next player

        $player->setAllowedActions(array('move_roll'));
        $em->flush();

        return new JsonResponse(array(
            'allowed_actions' => $player->getAllowedActions(),
        ));
    }
}
