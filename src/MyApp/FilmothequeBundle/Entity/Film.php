<?php

namespace MyApp\FilmothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Film
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Film
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
     * @ORM\ManyToMany(targetEntity="MyApp\FilmothequeBundle\Entity\Acteur" , cascade={"persist"})
     */
    private $acteur;
    
    
    /**
     * @ORM\OneToOne(targetEntity="MyApp\FilmothequeBundle\Entity\Categorie")
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    
    
    
    


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
     * Set titre
     *
     * @param string $titre
     * @return Film
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Film
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
     * Set acteur
     *
     * @param \MyApp\FilmothequeBundle\Entity\Acteur $acteur
     * @return Film
     */
    public function setActeur(\MyApp\FilmothequeBundle\Entity\Acteur $acteur = null)
    {
        $this->acteur = $acteur;

        return $this;
    }

    /**
     * Get acteur
     *
     * @return \MyApp\FilmothequeBundle\Entity\Acteur 
     */
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Set categorie
     *
     * @param \MyApp\FilmothequeBundle\Entity\Categorie $categorie
     * @return Film
     */
    public function setCategorie(\MyApp\FilmothequeBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \MyApp\FilmothequeBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->acteur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add acteur
     *
     * @param \MyApp\FilmothequeBundle\Entity\Acteur $acteur
     * @return Film
     */
    public function addActeur(\MyApp\FilmothequeBundle\Entity\Acteur $acteur)
    {
        $this->acteur[] = $acteur;

        return $this;
    }

    /**
     * Remove acteur
     *
     * @param \MyApp\FilmothequeBundle\Entity\Acteur $acteur
     */
    public function removeActeur(\MyApp\FilmothequeBundle\Entity\Acteur $acteur)
    {
        $this->acteur->removeElement($acteur);
    }
}
