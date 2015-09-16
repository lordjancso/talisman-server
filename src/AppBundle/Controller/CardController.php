<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class CardController extends Controller
{
    public function drawAdventureAction()
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $card = $em->getRepository('AppBundle:AdventureCard')->findRandom();

        return new JsonResponse(array(
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
