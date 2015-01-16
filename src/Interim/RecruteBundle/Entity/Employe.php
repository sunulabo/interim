<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\RecruteBundle\Entity\EmployeRepository")
 */
class Employe
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
     * @var integer
     *
     * @ORM\Column(name="salairenet", type="integer")
     */
    private $salairenet;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmbauche", type="datetime")
     */
    private $dateEmbauche;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbreJourConge", type="integer")
     */
    private $nbreJourConge;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255)
     */
    private $fonction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefinContrat", type="datetime")
     */
    private $datefinContrat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebutContrat", type="datetime")
     */
    private $datedebutContrat;


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
     * Set salairenet
     *
     * @param integer $salairenet
     * @return Employe
     */
    public function setSalairenet($salairenet)
    {
        $this->salairenet = $salairenet;

        return $this;
    }

    /**
     * Get salairenet
     *
     * @return integer 
     */
    public function getSalairenet()
    {
        return $this->salairenet;
    }

    /**
     * Set dateEmbauche
     *
     * @param \DateTime $dateEmbauche
     * @return Employe
     */
    public function setDateEmbauche($dateEmbauche)
    {
        $this->dateEmbauche = $dateEmbauche;

        return $this;
    }

    /**
     * Get dateEmbauche
     *
     * @return \DateTime 
     */
    public function getDateEmbauche()
    {
        return $this->dateEmbauche;
    }

    /**
     * Set nbreJourConge
     *
     * @param integer $nbreJourConge
     * @return Employe
     */
    public function setNbreJourConge($nbreJourConge)
    {
        $this->nbreJourConge = $nbreJourConge;

        return $this;
    }

    /**
     * Get nbreJourConge
     *
     * @return integer 
     */
    public function getNbreJourConge()
    {
        return $this->nbreJourConge;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     * @return Employe
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set fonction
     *
     * @param string $fonction
     * @return Employe
     */
    public function setFonction($fonction)
    {
        $this->fonction = $fonction;

        return $this;
    }

    /**
     * Get fonction
     *
     * @return string 
     */
    public function getFonction()
    {
        return $this->fonction;
    }

    /**
     * Set datefinContrat
     *
     * @param \DateTime $datefinContrat
     * @return Employe
     */
    public function setDatefinContrat($datefinContrat)
    {
        $this->datefinContrat = $datefinContrat;

        return $this;
    }

    /**
     * Get datefinContrat
     *
     * @return \DateTime 
     */
    public function getDatefinContrat()
    {
        return $this->datefinContrat;
    }

    /**
     * Set datedebutContrat
     *
     * @param \DateTime $datedebutContrat
     * @return Employe
     */
    public function setDatedebutContrat($datedebutContrat)
    {
        $this->datedebutContrat = $datedebutContrat;

        return $this;
    }

    /**
     * Get datedebutContrat
     *
     * @return \DateTime 
     */
    public function getDatedebutContrat()
    {
        return $this->datedebutContrat;
    }
}
