<?php

namespace AppBundle\Service;

use AppBundle\Board\Space;

class MoveService
{
    /**
     * Calculate possible destinations of a player by roll value and current position.
     *
     * @param $position int
     * @param $roll int
     * @param $from null|int
     * @param $destinations array
     *
     * @return array
     */
    public function getPossibleDestinationsByRoll($position, $roll, $from = null, &$destinations = array())
    {
        $current = Space::get($position, 'connections');
        $roll = $roll - 1;

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
