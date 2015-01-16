<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convention
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\RecruteBundle\Entity\ConventionRepository")
 */
class Convention
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="convention", type="string", length=255)
     */
    private $convention;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set convention
     *
     * @param string $convention
     * @return Convention
     */
    public function setConvention($convention)
    {
        $this->convention = $convention;

        return $this;
    }

    /**
     * Get convention
     *
     * @return string 
     */
    public function getConvention()
    {
        return $this->convention;
    }
}
