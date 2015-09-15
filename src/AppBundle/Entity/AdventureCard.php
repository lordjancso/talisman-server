<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AdventureCard.
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\AdventureCardRepository")
 */
class AdventureCard
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_type", type="string", length=255, nullable=true)
     */
    private $subType;

    /**
     * @var int
     *
     * @ORM\Column(name="strength", type="integer", nullable=true)
     */
    private $strength;

    /**
     * @var int
     *
     * @ORM\Column(name="craft", type="integer", nullable=true)
     */
    private $craft;

    /**
     * @var int
     *
     * @ORM\Column(name="encounter_number", type="integer")
     */
    private $encounterNumber;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

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
     * Set name.
     *
     * @param string $name
     *
     * @return AdventureCard
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return AdventureCard
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image.
     *
     * @param string $image
     *
     * @return AdventureCard
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set type.
     *
     * @param string $type
     *
     * @return AdventureCard
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set subType.
     *
     * @param string $subType
     *
     * @return AdventureCard
     */
    public function setSubType($subType)
    {
        $this->subType = $subType;

        return $this;
    }

    /**
     * Get subType.
     *
     * @return string
     */
    public function getSubType()
    {
        return $this->subType;
    }

    /**
     * Set strength.
     *
     * @param int $strength
     *
     * @return AdventureCard
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
     * @return AdventureCard
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
     * Set encounterNumber.
     *
     * @param int $encounterNumber
     *
     * @return AdventureCard
     */
    public function setEncounterNumber($encounterNumber)
    {
        $this->encounterNumber = $encounterNumber;

        return $this;
    }

    /**
     * Get encounterNumber.
     *
     * @return int
     */
    public function getEncounterNumber()
    {
        return $this->encounterNumber;
    }

    /**
     * Set quantity.
     *
     * @param int $quantity
     *
     * @return AdventureCard
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
}
