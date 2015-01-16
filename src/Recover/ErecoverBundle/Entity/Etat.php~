<?php

namespace Recover\ErecoverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Etat
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Recover\ErecoverBundle\Entity\EtatRepository")
 */
class Etat
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
     * @Assert\NotBlank(message = " Ce champ ne doit pas etre vide.")
     * 
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;


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
     * Set etat
     *
     * @param string $etat
     * @return Etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }
    public function __toString()
    {
    	return $this->etat;
    }
}
