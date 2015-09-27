<?php

namespace AppBundle\Security;

use AppBundle\Entity\Player;
use Doctrine\Common\Annotations\Reader;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class RequiredMoveListener
{
    private $reader;
    private $tokenStorage;
    private $entityManager;
    private $annotationName = 'AppBundle\Security\Annotation\RequiredAction';

    public function __construct(Reader $reader, TokenStorage $tokenStorage, EntityManager $entityManager)
    {
        $this->reader = $reader;
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $className = get_class($event->getController()[0]);
        $methodName = $event->getController()[1];
        $method = new \ReflectionMethod($className, $methodName);

        $annotation = $this->reader->getMethodAnnotation($method, $this->annotationName);

        if (!is_null($annotation)) {
            $action = $annotation->getAction();
            $user = $this->tokenStorage->getToken()->getUser();

            //$player = $user->getPlayer();
            $player = $this->entityManager->getRepository('AppBundle:Player')->find(1);

            if (!in_array($action, $player->getAllowedActions())) {
                throw new NotFoundHttpException();
            }
        }
    }
}
