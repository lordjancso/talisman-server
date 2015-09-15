<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdventureCardRepository extends EntityRepository
{
    /**
     * Find a random adventure card.
     *
     * @return AdventureCard
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findRandom()
    {
        $count = $this->createQueryBuilder('c')
            ->select('COUNT(c)')
            ->getQuery()
            ->getSingleScalarResult();

        $card = $this->createQueryBuilder('c')
            ->setFirstResult(mt_rand(0, $count - 1))
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();

        return $card;
    }
}
