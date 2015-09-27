<?php

namespace AppBundle\Controller;

use AppBundle\Security\Annotation\RequiredAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class EncounterController extends Controller
{
    /**
     * Accept encounter with drawn adventure cards.
     *
     * @RequiredAction("encounter_adventure")
     *
     * @return JsonResponse
     */
    public function adventureAction()
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $log = $em->getRepository('AppBundle:Log')->findLastDrawnAdventureCard($player);

        $cards = array();
        foreach ($log->getSubjects() as $subject) {
            $card = $em->getRepository('AppBundle:AdventureCard')->find($subject);

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
        }

        $encounterNumbers = array();
        foreach ($cards as $key => $card) {
            $encounterNumbers[$key] = $card['encounter_number'];
        }
        array_multisort($encounterNumbers, SORT_ASC, $cards);

        return new JsonResponse($cards);
    }

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
        } elseif ($playerResult < $enemyResult) {
            $result = 'lose';

            $player->setLife($player->getLife() - 1);

            $em->flush();
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
