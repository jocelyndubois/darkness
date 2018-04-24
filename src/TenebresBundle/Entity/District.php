<?php

namespace TenebresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * District
 *
 * @ORM\Table(name="district")
 * @ORM\Entity(repositoryClass="TenebresBundle\Repository\DistrictRepository")
 */
class District
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=5000, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    private $size;

    /**
     * @ORM\OneToMany(targetEntity="Place", mappedBy="category", cascade={"persist", "remove"})
     */
    private $places;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return District
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return District
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return District
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->places = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add place
     *
     * @param \TenebresBundle\Entity\Place $place
     *
     * @return District
     */
    public function addPlace(\TenebresBundle\Entity\Place $place)
    {
        $this->places[] = $place;

        return $this;
    }

    /**
     * Remove place
     *
     * @param \TenebresBundle\Entity\Place $place
     */
    public function removePlace(\TenebresBundle\Entity\Place $place)
    {
        $this->places->removeElement($place);
    }

    /**
     * Get places
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlaces()
    {
        return $this->places;
    }
}
