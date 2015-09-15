<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MoveController extends Controller
{
    public function rollAction()
    {
        $em = $this->getDoctrine()->getManager();

        $player = $em->getRepository('AppBundle:Player')->find(1);

        $position = 14;
        $roll = 6;

        $possible_destinations = $this->get('app.move')->getPossibleDestinationsByRoll($position, $roll);

        var_dump($possible_destinations);
        die();
    }

    public function toAction($id)
    {
        //
    }
}
