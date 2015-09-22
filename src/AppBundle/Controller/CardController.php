<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class CardController extends Controller
{
    public function drawAdventureAction($count)
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

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

    public function acceptAction($id)
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $card = $em->getRepository('AppBundle:AdventureCard')->find($id);

        $actions = array();
        if ($card->getType() == 'Enemy') {
            $actions[] = array(
                'attack',
            );
        }

        return new JsonResponse(array(
            'actions' => $actions,
            'id' => $card->getId(),
            'name' => $card->getName(),
            'description' => $card->getDescription(),
            'image' => $card->getImage(),
            'type' => $card->getType(),
            'sub_type' => $card->getSubType(),
            'strength' => $card->getStrength(),
            'craft' => $card->getCraft(),
            'encounter_number' => $card->getEncounterNumber(),
        ));
    }
}
