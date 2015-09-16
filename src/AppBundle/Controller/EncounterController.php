<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class EncounterController extends Controller
{
    public function attackCardAction($id)
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $card = $em->getRepository('AppBundle:AdventureCard')->find($id);

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

    public function fightAction($id)
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $card = $em->getRepository('AppBundle:AdventureCard')->find($id);

        $player_roll = mt_rand(1, 6);
        $enemy_roll = mt_rand(1, 6);

        $player_strength = $player->getStrength() + $player_roll;
        $enemy_strength = $card->getStrength() + $enemy_roll;

        if ($player_strength > $enemy_strength) {
            $result = 'win';
            $player->setLife($player->getLife() - 1);

            $em->flush();
        } elseif ($player_strength < $enemy_strength) {
            $result = 'lose';
        } else {
            $result = 'standoff';
        }

        return new JsonResponse(array(
            'result' => $result,
        ));
    }
}
