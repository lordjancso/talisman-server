<?php

namespace AppBundle\Service;

use AppBundle\Board\Space;

class MoveService
{
    public function getPossibleDestinationsByRoll($position, $roll, $from = null, &$destinations = array())
    {
        $current = Space::get($position);
        $roll--;

        foreach ($current as $next) {
            if ($from == $next) {
                continue;
            }

            if ($roll == 0) {
                $destinations[] = $next;
            } else {
                $this->getPossibleDestinationsByRoll($next, $roll, $position, $destinations);
            }
        }

        return $destinations;
    }
}
