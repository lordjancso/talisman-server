<?php

namespace AppBundle\Security;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class ApiKeyUserProvider implements UserProviderInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getUsernameForApiKey($apiKey)
    {
        $player = $this->entityManager->getRepository('AppBundle:Player')->findOneBy(array(
            'apiKey' => $apiKey,
        ));

        if (!$player) {
            throw new UsernameNotFoundException();
        }

        $username = $player->getUser()->getUsername();

        return $username;
    }

    public function loadUserByUsername($username)
    {
        $user = $this->entityManager->getRepository('AppBundle:User')->findOneBy(array(
            'username' => $username,
        ));

        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return 'AppBundle\Entity\User' === $class;
    }
}
