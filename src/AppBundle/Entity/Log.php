<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log.
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\LogRepository")
 */
class Log
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255)
     */
    private $action;

    /**
     * @var array
     *
     * @ORM\Column(name="subjects", type="simple_array")
     */
    private $subjects;

    /**
     * @var Player
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Player", inversedBy="logs")
     */
    private $player;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set action.
     *
     * @param string $action
     *
     * @return Log
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set subjects.
     *
     * @param array $subjects
     *
     * @return Log.
     */
    public function setSubjects($subjects)
    {
        $this->subjects = $subjects;

        return $this;
    }

    /**
     * Get subjects.
     *
     * @return array
     */
    public function getSubjects()
    {
        return $this->subjects;
    }

    /**
     * Set player.
     *
     * @param \AppBundle\Entity\Player $player
     *
     * @return Log
     */
    public function setPlayer(\AppBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player.
     *
     * @return \AppBundle\Entity\Player
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
