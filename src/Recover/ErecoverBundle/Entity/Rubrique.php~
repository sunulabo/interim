<?php

namespace Recover\ErecoverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Rubrique
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Recover\ErecoverBundle\Entity\RubriqueRepository")
 */
class Rubrique
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
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="rubrique", type="string", length=255)
     */
    private $rubrique;


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
     * Set rubrique
     *
     * @param string $rubrique
     * @return Rubrique
     */
    public function setRubrique($rubrique)
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    /**
     * Get rubrique
     *
     * @return string 
     */
    public function getRubrique()
    {
        return $this->rubrique;
        
    }
    
    public function __toString()
    {
    	return $this->rubrique;
    }
}
