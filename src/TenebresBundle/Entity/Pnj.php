<?php

namespace TenebresBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Pnj
 *
 * @ORM\Table(name="pnj")
 * @ORM\Entity(repositoryClass="TenebresBundle\Repository\PnjRepository")
 */
class Pnj
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
     * @ORM\Column(name="alias", type="string", length=255, nullable=true)
     */
    private $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=5000, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="string", length=255, nullable=true)
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="rumor", type="string", length=5000, nullable=true)
     */
    private $rumor;

    /**
     * @return string
     */
    public function __toString()
    {
        if ($this->getName()) {
            return $this->getName();
        } elseif ($this->getAlias()) {
            return $this->getAlias();
        }

        return $this->getDescription();
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
     * @return Pnj
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
     * Set alias
     *
     * @param string $alias
     *
     * @return Pnj
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Pnj
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
     * Set job
     *
     * @param string $job
     *
     * @return Pnj
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set rumor
     *
     * @param string $rumor
     *
     * @return Pnj
     */
    public function setRumor($rumor)
    {
        $this->rumor = $rumor;

        return $this;
    }

    /**
     * Get rumor
     *
     * @return string
     */
    public function getRumor()
    {
        return $this->rumor;
    }
}
