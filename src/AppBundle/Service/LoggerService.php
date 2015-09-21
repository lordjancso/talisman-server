<?php

namespace AppBundle\Service;

use AppBundle\Entity\Log;
use AppBundle\Entity\Player;
use Doctrine\ORM\EntityManager;

class LoggerService
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(Player $player, $action, $subjects)
    {
        if (is_object($subjects)) {
            $subjects = array($subjects->getId());
        } elseif (!is_array($subjects)) {
            $subjects = array($subjects);
        }

        $log = new Log();
        $log->setPlayer($player);
        $log->setAction($action);
        $log->setSubjects($subjects);

        $this->entityManager->persist($log);

        return $log;
    }
}
