<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regime
 *
 * @ORM\Table(name="regimes")
 * @ORM\Entity(repositoryClass="Interim\RecruteBundle\Entity\RegimeRepository")
 */
class Regime
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
     * @ORM\Column(name="regime", type="string", length=255)
     */
    private $regime;


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
     * Set regime
     *
     * @param string $regime
     * @return Regime
     */
    public function setRegime($regime)
    {
        $this->regime = $regime;

        return $this;
    }

    /**
     * Get regime
     *
     * @return string 
     */
    public function getRegime()
    {
        return $this->regime;
    }
}
