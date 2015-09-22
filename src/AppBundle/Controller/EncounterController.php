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

        $playerRoll = mt_rand(1, 6);
        $enemyRoll = mt_rand(1, 6);
        $playerStrength = $player->getStrength();
        $enemyStrength = $card->getStrength();

        $playerResult = $playerStrength + $playerRoll;
        $enemyResult = $enemyStrength + $enemyRoll;

        if ($playerResult > $enemyResult) {
            $result = 'win';
            $player->setLife($player->getLife() - 1);

            $em->flush();
        } elseif ($playerResult < $enemyResult) {
            $result = 'lose';
        } else {
            $result = 'standoff';
        }

        return new JsonResponse(array(
            'result' => $result,
            'player_strength' => $playerStrength,
            'enemy_strength' => $enemyStrength,
            'player_roll' => $playerRoll,
            'enemy_roll' => $enemyRoll,
            'player_result' => $playerResult,
            'enemy_result' => $enemyResult,
        ));
    }
}
