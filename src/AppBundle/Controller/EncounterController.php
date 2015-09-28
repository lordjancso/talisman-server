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

        if ($cards[0]['type'] == 'Enemy') {
            $allowedActions = array('fight_enemy');
        } elseif ($cards[0]['type'] == 'Event') {
            $allowedActions = array('encounter_event');
        } elseif ($cards[0]['type'] == 'Follower') {
            $allowedActions = array('take_follower', 'leave_follower');
        } elseif ($cards[0]['type'] == 'Magic Object') {
            $allowedActions = array('take_magic_object');
        } elseif ($cards[0]['type'] == 'Object') {
            $allowedActions = array('take_object');
        } elseif ($cards[0]['type'] == 'Place') {
            $allowedActions = array('encounter_place');
        } elseif ($cards[0]['type'] == 'Stranger') {
            $allowedActions = array('encounter_stranger');
        } else {
            throw new \Exception('Invalid adventure card type: '.$cards[0]['type']);
        }

        $player->setAllowedActions($allowedActions);
        $em->flush();

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
}
