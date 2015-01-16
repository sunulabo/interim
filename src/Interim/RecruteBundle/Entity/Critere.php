<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Critere
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\RecruteBundle\Entity\CritereRepository")
 */
class Critere
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="motcle", type="string", length=255)
     */
    private $motcle;


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
     * Set libelle
     *
     * @param string $libelle
     * @return Critere
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set motcle
     *
     * @param string $motcle
     * @return Critere
     */
    public function setMotcle($motcle)
    {
        $this->motcle = $motcle;

        return $this;
    }

    /**
     * Get motcle
     *
     * @return string 
     */
    public function getMotcle()
    {
        return $this->motcle;
    }
    public function __toString()
    {
    	return $this->libelle;
    }
}
