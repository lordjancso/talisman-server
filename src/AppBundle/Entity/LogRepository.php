<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * LogRepository.
 */
class LogRepository extends EntityRepository
{
    /**
     * Find last roll action by player.
     *
     * @param Player $player
     *
     * @return Log
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findLastRoll(Player $player)
    {
        $log = $this->createQueryBuilder('l')
            ->andWhere('l.player = :player')
            ->andwhere('l.action = :action')
            ->orderBy('l.id', 'DESC')
            ->setParameters(array(
                'player' => $player,
                'action' => 'roll',
            ))
            ->setFirstResult(0)
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();

        return $log;
    }
}
