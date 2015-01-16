<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorieSalBase")
 * @ORM\Entity(repositoryClass="Interim\RecruteBundle\Entity\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="categorie", type="string", length=255)
     */
    private $categorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="salaireBase", type="integer")
     */
    private $salaireBase;

    /**
     * @var integer
     *
     * @ORM\Column(name="tauxHoraire", type="integer")
     */
    private $tauxHoraire;


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
     * Set categorie
     *
     * @param string $categorie
     * @return Categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set salaireBase
     *
     * @param integer $salaireBase
     * @return Categorie
     */
    public function setSalaireBase($salaireBase)
    {
        $this->salaireBase = $salaireBase;

        return $this;
    }

    /**
     * Get salaireBase
     *
     * @return integer 
     */
    public function getSalaireBase()
    {
        return $this->salaireBase;
    }

    /**
     * Set tauxHoraire
     *
     * @param integer $tauxHoraire
     * @return Categorie
     */
    public function setTauxHoraire($tauxHoraire)
    {
        $this->tauxHoraire = $tauxHoraire;

        return $this;
    }

    /**
     * Get tauxHoraire
     *
     * @return integer 
     */
    public function getTauxHoraire()
    {
        return $this->tauxHoraire;
    }
}
