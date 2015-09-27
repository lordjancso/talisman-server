<?php

namespace AppBundle\Controller;

use AppBundle\Security\Annotation\RequiredAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DrawController extends Controller
{
    /**
     * Draw one or more random adventure card from the deck.
     *
     * @RequiredAction("draw_adventure")
     *
     * @return JsonResponse
     */
    public function adventureAction()
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $count = 1; //based on your location
        $cards = array();

        for ($i = 0; $i < $count; ++$i) {
            $card = $em->getRepository('AppBundle:AdventureCard')->findRandom();

            $cards[] = array(
                'id' => $card->getId(),
                'name' => $card->getName(),
                'description' => $card->getDescription(),
                'image' => $card->getImage(),
                'type' => $card->getType(),
                'sub_type' => $card->getSubType(),
                'strength' => $card->getStrength(),
                'craft' => $card->getCraft(),
                'encounter_number' => $card->getEncounterNumber(),
            );

            $this->get('app.logger')->create($player, 'draw_adventure', $card);
        }

        $em->flush();

        return new JsonResponse($cards);
    }
}
