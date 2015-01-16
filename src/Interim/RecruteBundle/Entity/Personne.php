<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Personne
 *
 * @ORM\Table(name="Personnes")
 * @ORM\Entity(repositoryClass="Interim\RecruteBundle\Entity\PersonneRepository")
 */
class Personne
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * 
     *      
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="matricule", type="integer")
     *
     *
     *
     * 
     * 
     */
    private $matricule;

    /**
     * @var string
     * 
     *      
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true))
     */
    private $prenom;

    /**
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=true))
     */
    private $nom;

    /**
     * 
     *      
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     *     
     *
     *
     * @ORM\Column(name="lieu_naissance", type="string", length=255, nullable=true))
     */
    private $lieuNaissance;

    /**
     * 
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=255)
     */
    private $nationalite;

    /**
     * 
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="numero_Identite", type="string", length=255)
     */
    private $numeroIdentite;

    /**
     * @var string
     *
     *     
     *
     * @ORM\Column(name="num_passport", type="string", length=255, nullable=true)
     */
    private $numPassport;

    /**
     * @var string
     *
     *     
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     * 
    
     */
    private $sexe;

    /**
     * @var string
     *
     *     
     *
     * @ORM\Column(name="situation_matrimoniale", type="string", length=255)
     */
    private $situationMatrimoniale;

    /**
     * @var integer
     *
     *     
     *
     * @ORM\Column(name="nb_femme", type="integer", nullable=true)
     */
    private $nbFemme;

    /**
     * 
     *      
     * @var integer
     *
     * @ORM\Column(name="nb_enfant", type="integer", nullable=true)
     */
    private $nbEnfant;

    /**
     * 
     *      
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * 
     *      
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     * 
     *      
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     *
     *      
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=255, nullable=true)
     */
    private $civilite;

    /**
     *
     *      
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true))
     */
    private $adresse;

    /**
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="tel_fixe", type="string", length=255, nullable=true)
     */
    private $telFixe;

    /**
     *     
     * 
     * @var string
     *
     * @ORM\Column(name="tel_mobile", type="string", length=255, nullable=true)
     */
    private $telMobile;

    /**
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255, nullable=true)
     */
    private $fax;

    /**
     *
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * 
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="num_permisConduire", type="string", length=255, nullable=true)
     */
    private $numPermisConduire;

    /**
     *
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="num_portArme", type="string", length=255, nullable=true)
     */
    private $numPortArme;

    /**
     *
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="niveauEtude", type="string", length=255, nullable=true)
     */
    private $niveauEtude;

    /**
     * 
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="artMartial", type="string", length=255, nullable=true)
     */
    private $artMartial;

    /**
     * 
     *      
     * 
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @var string
     *
     *      
     *
     * @ORM\Column(name="qualification", type="string", length=255, nullable=true)
     */
    private $qualification;
    
    /**
     *      
     * 
     *@ORM\OneToMany(targetEntity="Interim\RecruteBundle\Entity\Poste", cascade={"persist"}, mappedBy="personne")
     */
    private $poste;
    
    /**
     *
     *     
     *
     *@ORM\OneToMany(targetEntity="Interim\RecruteBundle\Entity\Langue", cascade={"persist"}, mappedBy="personne")
     */
    
    private $langue;
    
    /**
     *
     *     
     *@ORM\OneToMany(targetEntity="Interim\RecruteBundle\Entity\Experience", cascade={"persist"} ,mappedBy="personne")
     *
     */
    private $experience;
    /**
     *     
     *@ORM\OneToMany(targetEntity="Interim\RecruteBundle\Entity\Formation", cascade={"persist"},mappedBy="personne")
     */
    private $formation;
    
    
    /**
     *
     *     
     *@ORM\OneToMany(targetEntity="Interim\RecruteBundle\Entity\Competence", cascade={"persist"},mappedBy="personne")
     */
    private $competence;
    
    
    
    /**
     *     
     *@ORM\OneToMany(targetEntity="Interim\RecruteBundle\Entity\CentreInteret", cascade={"persist"},mappedBy="personne")
     */
    private $centreInteret;
   
    
    /**
     *
     *
     *
     * 
     *
     * 
     * @ORM\OneToOne(targetEntity="Interim\RecruteBundle\Entity\Image", cascade={"persist"})
     */
    private $cv;
    
    
    /**
     *
     * @ORM\OneToOne(targetEntity="Interim\RecruteBundle\Entity\Image", cascade={"persist"})
     */
    private $image;
    
   
    /**
     *
     *
     *
     *
     *
     *
     * @ORM\OneToOne(targetEntity="Interim\UserBundle\Entity\User", cascade={"persist"})
     */
    private $user;
    
   
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->poste = new \Doctrine\Common\Collections\ArrayCollection();
        $this->langue = new \Doctrine\Common\Collections\ArrayCollection();
        $this->experience = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->competence = new \Doctrine\Common\Collections\ArrayCollection();
        $this->centreInteret = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set prenom
     *
     * @param string $prenom
     * @return Personne
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Personne
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Personne
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set lieuNaissance
     *
     * @param string $lieuNaissance
     * @return Personne
     */
    public function setLieuNaissance($lieuNaissance)
    {
        $this->lieuNaissance = $lieuNaissance;

        return $this;
    }

    /**
     * Get lieuNaissance
     *
     * @return string 
     */
    public function getLieuNaissance()
    {
        return $this->lieuNaissance;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     * @return Personne
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string 
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set numeroIdentite
     *
     * @param string $numeroIdentite
     * @return Personne
     */
    public function setNumeroIdentite($numeroIdentite)
    {
        $this->numeroIdentite = $numeroIdentite;

        return $this;
    }

    /**
     * Get numeroIdentite
     *
     * @return string 
     */
    public function getNumeroIdentite()
    {
        return $this->numeroIdentite;
    }

    /**
     * Set numPassport
     *
     * @param string $numPassport
     * @return Personne
     */
    public function setNumPassport($numPassport)
    {
        $this->numPassport = $numPassport;

        return $this;
    }

    /**
     * Get numPassport
     *
     * @return string 
     */
    public function getNumPassport()
    {
        return $this->numPassport;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Personne
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set situationMatrimoniale
     *
     * @param string $situationMatrimoniale
     * @return Personne
     */
    public function setSituationMatrimoniale($situationMatrimoniale)
    {
        $this->situationMatrimoniale = $situationMatrimoniale;

        return $this;
    }

    /**
     * Get situationMatrimoniale
     *
     * @return string 
     */
    public function getSituationMatrimoniale()
    {
        return $this->situationMatrimoniale;
    }

    /**
     * Set nbFemme
     *
     * @param integer $nbFemme
     * @return Personne
     */
    public function setNbFemme($nbFemme)
    {
        $this->nbFemme = $nbFemme;

        return $this;
    }

    /**
     * Get nbFemme
     *
     * @return integer 
     */
    public function getNbFemme()
    {
        return $this->nbFemme;
    }

    /**
     * Set nbEnfant
     *
     * @param integer $nbEnfant
     * @return Personne
     */
    public function setNbEnfant($nbEnfant)
    {
        $this->nbEnfant = $nbEnfant;

        return $this;
    }

    /**
     * Get nbEnfant
     *
     * @return integer 
     */
    public function getNbEnfant()
    {
        return $this->nbEnfant;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Personne
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Personne
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Personne
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     * @return Personne
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Personne
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telFixe
     *
     * @param string $telFixe
     * @return Personne
     */
    public function setTelFixe($telFixe)
    {
        $this->telFixe = $telFixe;

        return $this;
    }

    /**
     * Get telFixe
     *
     * @return string 
     */
    public function getTelFixe()
    {
        return $this->telFixe;
    }

    /**
     * Set telMobile
     *
     * @param string $telMobile
     * @return Personne
     */
    public function setTelMobile($telMobile)
    {
        $this->telMobile = $telMobile;

        return $this;
    }

    /**
     * Get telMobile
     *
     * @return string 
     */
    public function getTelMobile()
    {
        return $this->telMobile;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Personne
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Personne
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set numPermisConduire
     *
     * @param string $numPermisConduire
     * @return Personne
     */
    public function setNumPermisConduire($numPermisConduire)
    {
        $this->numPermisConduire = $numPermisConduire;

        return $this;
    }

    /**
     * Get numPermisConduire
     *
     * @return string 
     */
    public function getNumPermisConduire()
    {
        return $this->numPermisConduire;
    }

    /**
     * Set numPortArme
     *
     * @param string $numPortArme
     * @return Personne
     */
    public function setNumPortArme($numPortArme)
    {
        $this->numPortArme = $numPortArme;

        return $this;
    }

    /**
     * Get numPortArme
     *
     * @return string 
     */
    public function getNumPortArme()
    {
        return $this->numPortArme;
    }

    /**
     * Set niveauEtude
     *
     * @param string $niveauEtude
     * @return Personne
     */
    public function setNiveauEtude($niveauEtude)
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    /**
     * Get niveauEtude
     *
     * @return string 
     */
    public function getNiveauEtude()
    {
        return $this->niveauEtude;
    }

    /**
     * Set artMartial
     *
     * @param string $artMartial
     * @return Personne
     */
    public function setArtMartial($artMartial)
    {
        $this->artMartial = $artMartial;

        return $this;
    }

    /**
     * Get artMartial
     *
     * @return string 
     */
    public function getArtMartial()
    {
        return $this->artMartial;
    }

    /**
     * Set profession
     *
     * @param string $profession
     * @return Personne
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string 
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set qualification
     *
     * @param string $qualification
     * @return Personne
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;

        return $this;
    }

    /**
     * Get qualification
     *
     * @return string 
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * Set cv
     *
     * @param string $cv
     * @return Personne
     */
    public function setCv($cv)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return string 
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Add poste
     *
     * @param \Interim\RecruteBundle\Entity\Poste $poste
     * @return Personne
     */
    public function addPoste(\Interim\RecruteBundle\Entity\Poste $poste)
    {
        $this->poste[] = $poste;

        return $this;
    }

    /**
     * Remove poste
     *
     * @param \Interim\RecruteBundle\Entity\Poste $poste
     */
    public function removePoste(\Interim\RecruteBundle\Entity\Poste $poste)
    {
        $this->poste->removeElement($poste);
    }

    /**
     * Get poste
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPoste()
    {
        return $this->poste;
    }

    /**
     * Add langue
     *
     * @param \Interim\RecruteBundle\Entity\Langue $langue
     * @return Personne
     */
    public function addLangue(\Interim\RecruteBundle\Entity\Langue $langue)
    {
        $this->langue[] = $langue;

        return $this;
    }

    /**
     * Remove langue
     *
     * @param \Interim\RecruteBundle\Entity\Langue $langue
     */
    public function removeLangue(\Interim\RecruteBundle\Entity\Langue $langue)
    {
        $this->langue->removeElement($langue);
    }

    /**
     * Get langue
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Add experience
     *
     * @param \Interim\RecruteBundle\Entity\Experience $experience
     * @return Personne
     */
    public function addExperience(\Interim\RecruteBundle\Entity\Experience $experience)
    {
        $this->experience[] = $experience;

        return $this;
    }

    /**
     * Remove experience
     *
     * @param \Interim\RecruteBundle\Entity\Experience $experience
     */
    public function removeExperience(\Interim\RecruteBundle\Entity\Experience $experience)
    {
        $this->experience->removeElement($experience);
    }

    /**
     * Get experience
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Add formation
     *
     * @param \Interim\RecruteBundle\Entity\Formation $formation
     * @return Personne
     */
    public function addFormation(\Interim\RecruteBundle\Entity\Formation $formation)
    {
        $this->formation[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \Interim\RecruteBundle\Entity\Formation $formation
     */
    public function removeFormation(\Interim\RecruteBundle\Entity\Formation $formation)
    {
        $this->formation->removeElement($formation);
    }

    /**
     * Get formation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Add competence
     *
     * @param \Interim\RecruteBundle\Entity\Competence $competence
     * @return Personne
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
     * Get competence
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Add centreInteret
     *
     * @param \Interim\RecruteBundle\Entity\CentreInteret $centreInteret
     * @return Personne
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

    /**
     * Get centreInteret
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCentreInteret()
    {
        return $this->centreInteret;
    }

    /**
     * Set image
     *
     * @param \Interim\RecruteBundle\Entity\Image $image
     * @return Personne
     */
    public function setImage(\Interim\RecruteBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Interim\RecruteBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set user
     *
     * @param \Interim\UserBundle\Entity\User $user
     * @return Personne
     */
    public function setUser(\Interim\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Interim\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set matricule
     *
     * @param integer $matricule
     * @return Personne
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return integer 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }
}
