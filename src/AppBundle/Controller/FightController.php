<?php

namespace AppBundle\Controller;

use AppBundle\Security\Annotation\RequiredAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class FightController extends Controller
{
    /**
     * Fight with last drawn adventure card.
     *
     * @RequiredAction("fight_adventure")
     *
     * @return JsonResponse
     */
    public function adventureAction()
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        $log = $em->getRepository('AppBundle:Log')->findLastDrawnAdventureCard($player);

        $card = $em->getRepository('AppBundle:AdventureCard')->find($log->getSubjects()[0]);

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
