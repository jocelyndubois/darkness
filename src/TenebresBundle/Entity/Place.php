<?php

namespace TenebresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Place
 *
 * @ORM\Table(name="place")
 * @ORM\Entity(repositoryClass="TenebresBundle\Repository\PlaceRepository")
 */
class Place
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
     * @var string
     *
     * @ORM\Column(name="idMap", type="string", length=5)
     */
    private $idMap;

    /**
     *
     * @ORM\ManyToMany(targetEntity="\TenebresBundle\Entity\Pnj", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $pnjs;

    /**
     * @ORM\ManyToOne(targetEntity="\TenebresBundle\Entity\District")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid()
     */
    private $disctrict;

    /**
     * @ORM\ManyToOne(targetEntity="\TenebresBundle\Entity\Category")
     * @ORM\JoinColumn(nullable=true)
     * @Assert\Valid()
     */
    private $category;

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
     * @return Place
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
     * @return Place
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
     * Set idMap
     *
     * @param string $idMap
     *
     * @return Place
     */
    public function setIdMap($idMap)
    {
        $this->idMap = $idMap;

        return $this;
    }

    /**
     * Get idMap
     *
     * @return string
     */
    public function getIdMap()
    {
        return $this->idMap;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pnjs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pnj
     *
     * @param \TenebresBundle\Entity\Pnj $pnj
     *
     * @return Place
     */
    public function addPnj(\TenebresBundle\Entity\Pnj $pnj)
    {
        $this->pnjs[] = $pnj;

        return $this;
    }

    /**
     * Remove pnj
     *
     * @param \TenebresBundle\Entity\Pnj $pnj
     */
    public function removePnj(\TenebresBundle\Entity\Pnj $pnj)
    {
        $this->pnjs->removeElement($pnj);
    }

    /**
     * Get pnjs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPnjs()
    {
        return $this->pnjs;
    }

    /**
     * Set disctrict
     *
     * @param \TenebresBundle\Entity\District $disctrict
     *
     * @return Place
     */
    public function setDisctrict(\TenebresBundle\Entity\District $disctrict = null)
    {
        $this->disctrict = $disctrict;

        return $this;
    }

    /**
     * Get disctrict
     *
     * @return \TenebresBundle\Entity\District
     */
    public function getDisctrict()
    {
        return $this->disctrict;
    }

    /**
     * Set category
     *
     * @param \TenebresBundle\Entity\Category $category
     *
     * @return Place
     */
    public function setCategory(\TenebresBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \TenebresBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}
