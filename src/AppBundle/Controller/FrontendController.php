<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
    public function startAction()
    {
        return $this->render('board/index.html.twig');
    }
}
