<?php

namespace AppBundle\Controller;

use AppBundle\Board\Space;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
    public function startAction()
    {
        $em = $this->getDoctrine()->getManager('default');
        $player = $em->getRepository('AppBundle:Player')->find(1);

        return $this->render('board/index.html.twig', array(
            'table' => array(
                array(1, 2, 3, 4, 5, 6, 7),
                array(24, 25, 26, 27, 28, 29, 8),
                array(23, 40, 41, 42, 43, 30, 9),
                array(22, 39, 48, 49, 44, 31, 10),
                array(21, 38, 47, 46, 45, 32, 11),
                array(20, 37, 36, 35, 34, 33, 12),
                array(19, 18, 17, 16, 15, 14, 13),
            ),
            'spaces' => Space::all(),
            'player' => $player,
        ));
    }
}
