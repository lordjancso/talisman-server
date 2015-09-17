<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Player.
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\PlayerRepository")
 */
class Player
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
     * @ORM\Column(name="_character", type="string", length=255)
     */
    private $character;

    /**
     * @var string
     *
     * @ORM\Column(name="alignment", type="string", length=255)
     */
    private $alignment;

    /**
     * @var int
     *
     * @ORM\Column(name="strength", type="integer")
     */
    private $strength;

    /**
     * @var int
     *
     * @ORM\Column(name="craft", type="integer")
     */
    private $craft;

    /**
     * @var int
     *
     * @ORM\Column(name="life", type="integer")
     */
    private $life;

    /**
     * @var int
     *
     * @ORM\Column(name="fate", type="integer")
     */
    private $fate;

    /**
     * @var int
     *
     * @ORM\Column(name="gold", type="integer")
     */
    private $gold;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var Log[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Log", mappedBy="player", cascade={"persist"})
     */
    private $logs;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->logs = new ArrayCollection();
    }

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
     * Set character.
     *
     * @param string $character
     *
     * @return Player
     */
    public function setCharacter($character)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get character.
     *
     * @return string
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Set alignment.
     *
     * @param string $alignment
     *
     * @return Player
     */
    public function setAlignment($alignment)
    {
        $this->alignment = $alignment;

        return $this;
    }

    /**
     * Get alignment.
     *
     * @return string
     */
    public function getAlignment()
    {
        return $this->alignment;
    }

    /**
     * Set strength.
     *
     * @param int $strength
     *
     * @return Player
     */
    public function setStrength($strength)
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get strength.
     *
     * @return int
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set craft.
     *
     * @param int $craft
     *
     * @return Player
     */
    public function setCraft($craft)
    {
        $this->craft = $craft;

        return $this;
    }

    /**
     * Get craft.
     *
     * @return int
     */
    public function getCraft()
    {
        return $this->craft;
    }

    /**
     * Set life.
     *
     * @param int $life
     *
     * @return Player
     */
    public function setLife($life)
    {
        $this->life = $life;

        return $this;
    }

    /**
     * Get life.
     *
     * @return int
     */
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Set fate.
     *
     * @param int $fate
     *
     * @return Player
     */
    public function setFate($fate)
    {
        $this->fate = $fate;

        return $this;
    }

    /**
     * Get fate.
     *
     * @return int
     */
    public function getFate()
    {
        return $this->fate;
    }

    /**
     * Set gold.
     *
     * @param int $gold
     *
     * @return Player
     */
    public function setGold($gold)
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * Get gold.
     *
     * @return int
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * Set position.
     *
     * @param int $position
     *
     * @return Player
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position.
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add logs.
     *
     * @param \AppBundle\Entity\Log $logs
     *
     * @return Player
     */
    public function addLog(\AppBundle\Entity\Log $logs)
    {
        $this->logs[] = $logs;

        return $this;
    }

    /**
     * Remove logs.
     *
     * @param \AppBundle\Entity\Log $logs
     */
    public function removeLog(\AppBundle\Entity\Log $logs)
    {
        $this->logs->removeElement($logs);
    }

    /**
     * Get logs.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLogs()
    {
        return $this->logs;
    }
}
