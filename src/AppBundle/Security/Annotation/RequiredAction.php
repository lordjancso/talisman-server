<?php

namespace AppBundle\Security\Annotation;

/**
 * @Annotation
 */
class RequiredAction
{
    private $action;

    public function __construct(array $parameters)
    {
        $this->action = $parameters['value'];
    }

    public function getAction()
    {
        return $this->action;
    }
}
