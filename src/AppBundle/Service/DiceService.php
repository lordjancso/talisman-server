<?php

namespace AppBundle\Service;

class DiceService
{
    public function rollToMove()
    {
        $roll = mt_rand(1, 6);
    }
}
