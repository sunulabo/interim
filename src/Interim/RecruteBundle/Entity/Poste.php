<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poste
 *
 * @ORM\Table(name="postes")
 * @ORM\Entity
 */
class Poste
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_limite", type="date")
     */
    private $dateLimite;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fonction", type="date")
     */
    private $dateFonction;

    /**
     * @var integer
     *
     * @ORM\Column(name="salaire", type="integer")
     */
    private $salaire;

    /**
     * @var string
     *
     * @ORM\Column(name="avantage", type="string", length=255)
     */
    private $avantage;

    /**
     * @var string
     *
     * @ORM\Column(name="tache", type="string", length=255)
     */
    private $tache;

    /**
     * @var string
     *
     * @ORM\Column(name="mission", type="string", length=255)
     */
    private $mission;

    /**
     * @var string
     *
     * @ORM\Column(name="objectif", type="string", length=255)
     */
    private $objectif;
    
    # Les Relations entre les societes 
    
    /**
     * 
     *@ORM\ManyToOne(targetEntity="Interim\RecruteBundle\Entity\Societe", cascade={"persist"} )
     */

   private $societe;
   
   
   /**
    *@ORM\OneToMany(targetEntity="Interim\RecruteBundle\Entity\Critere", cascade={"persist"}, mappedBy="poste")
    */
   private $critere;
   
   
   /**
    *
    * * @ORM\OneToMany(targetEntity="Interim\RecruteBundle\Entity\Competence", cascade={"persist"},mappedBy="poste")
    */
   private $competence;

   
   
    
    /**
     * * @ORM\OneToMany(targetEntity="CentreInteret", cascade={"persist"},mappedBy="poste")
     */
    private $centreInteret;
    
    
    # Fin Relations    
    
    


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
     * @return Poste
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
     * @return Poste
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
     * Set dateLimite
     *
     * @param \DateTime $dateLimite
     * @return Poste
     */
    public function setDateLimite($dateLimite)
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    /**
     * Get dateLimite
     *
     * @return \DateTime 
     */
    public function getDateLimite()
    {
        return $this->dateLimite;
    }

    /**
     * Set dateFonction
     *
     * @param \DateTime $dateFonction
     * @return Poste
     */
    public function setDateFonction($dateFonction)
    {
        $this->dateFonction = $dateFonction;

        return $this;
    }

    /**
     * Get dateFonction
     *
     * @return \DateTime 
     */
    public function getDateFonction()
    {
        return $this->dateFonction;
    }

    /**
     * Set salaire
     *
     * @param integer $salaire
     * @return Poste
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return integer 
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set avantage
     *
     * @param string $avantage
     * @return Poste
     */
    public function setAvantage($avantage)
    {
        $this->avantage = $avantage;

        return $this;
    }

    /**
     * Get avantage
     *
     * @return string 
     */
    public function getAvantage()
    {
        return $this->avantage;
    }

    /**
     * Set tache
     *
     * @param string $tache
     * @return Poste
     */
    public function setTache($tache)
    {
        $this->tache = $tache;

        return $this;
    }

    /**
     * Get tache
     *
     * @return string 
     */
    public function getTache()
    {
        return $this->tache;
    }

    /**
     * Set mission
     *
     * @param string $mission
     * @return Poste
     */
    public function setMission($mission)
    {
        $this->mission = $mission;

        return $this;
    }

    /**
     * Get mission
     *
     * @return string 
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * Set objectif
     *
     * @param string $objectif
     * @return Poste
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * Get objectif
     *
     * @return string 
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * Set societe
     *
     * @param string $societe
     * @return Poste
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return string 
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set critere
     *
     * @param string $critere
     * @return Poste
     */
    public function setCritere($critere)
    {
        $this->critere = $critere;

        return $this;
    }

    /**
     * Get critere
     *
     * @return string 
     */
    public function getCritere()
    {
        return $this->critere;
    }

    /**
     * Set competence
     *
     * @param string $competence
     * @return Poste
     */
    public function setCompetence($competence)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return string 
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Set centreInteret
     *
     * @param string $centreInteret
     * @return Poste
     */
    public function setCentreInteret($centreInteret)
    {
        $this->centreInteret = $centreInteret;

        return $this;
    }

    /**
     * Get centreInteret
     *
     * @return string 
     */
    public function getCentreInteret()
    {
        return $this->centreInteret;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->critere = new \Doctrine\Common\Collections\ArrayCollection();
        $this->competence = new \Doctrine\Common\Collections\ArrayCollection();
        $this->centreInteret = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add critere
     *
     * @param \Interim\RecruteBundle\Entity\Critere $critere
     * @return Poste
     */
    public function addCritere(\Interim\RecruteBundle\Entity\Critere $critere)
    {
        $this->critere[] = $critere;

        return $this;
    }

    /**
     * Remove critere
     *
     * @param \Interim\RecruteBundle\Entity\Critere $critere
     */
    public function removeCritere(\Interim\RecruteBundle\Entity\Critere $critere)
    {
        $this->critere->removeElement($critere);
    }

    /**
     * Add competence
     *
     * @param \Interim\RecruteBundle\Entity\Competence $competence
     * @return Poste
     */
    public function addCompetence(\Interim\RecruteBundle\Entity\Competence $competence)
    {
        $this->competence[] = $competence;

        return $this;
    }

    /**
     * Remove competence
     *
     * @param \Interim\RecruteBundle\Entity\Competence $competence
     */
    public function removeCompetence(\Interim\RecruteBundle\Entity\Competence $competence)
    {
        $this->competence->removeElement($competence);
    }

    /**
     * Add centreInteret
     *
     * @param \Interim\RecruteBundle\Entity\CentreInteret $centreInteret
     * @return Poste
     */
    public function addCentreInteret(\Interim\RecruteBundle\Entity\CentreInteret $centreInteret)
    {
        $this->centreInteret[] = $centreInteret;

        return $this;
    }

    /**
     * Remove centreInteret
     *
     * @param \Interim\RecruteBundle\Entity\CentreInteret $centreInteret
     */
    public function removeCentreInteret(\Interim\RecruteBundle\Entity\CentreInteret $centreInteret)
    {
        $this->centreInteret->removeElement($centreInteret);
    }
    public function __toString()
    {
    	return $this->titre;
    }
}
