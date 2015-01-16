<?php

namespace Interim\UserBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Recover\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;
    
    /**
     *
     *
     * @var string
     * @Assert\Length(
     *      min = "2",
     *      max = "10",
     *      minMessage = "Votre matricule doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre matricule ne peut pas tre plus long que {{ limit }} caractres"
     * )
     *
     * @ORM\Column(name="matricule", type="string", length=255, unique=true, nullable=true)
     */
    private $matricule;
    
    
    /**
     *
     *
     * @var string
     * @Assert\Length(
     *      min = "2",
     *      max = "150",
     *      minMessage = "Votre prenom doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre prenom ne peut pas tre plus long que {{ limit }} caractres"
     * )
     * @ORM\Column(name="prenom", type="string", length=255,nullable=true)
     */
    private $prenom;
    /**
     *
     *
     * @var string
     * 
     * @Assert\Length(
     *      min = "2",
     *      max = "50",
     *      minMessage = "Votre nom doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre nom ne peut pas tre plus long que {{ limit }} caractres"
     * )
     *
     * @ORM\Column(name="nom", type="string",nullable=true, length=255 )
     */
    private $nom;
    
    /**
     *
     *
     * @var \DateTime
     * @ORM\Column(name="date_naissance", type="date", length=255)
     * 
     */
    private $dateNaissance;
    
    /**
     * @var string
     *
     *
     * @Assert\Length(
     *      min = "2",
     *      max = "150",
     *      minMessage = "Votre lieu de naissance doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre lieu de naissance ne peut pas tre plus long que {{ limit }} caractres"
     * )
     *
     * @ORM\Column(name="lieu_naissance", type="string", length=255)
     */
    private $lieuNaissance;
    
    /**
     *
     *
     *
     * @var string
     * @Assert\Length(
     *      min = "2",
     *      max = "150",
     *      minMessage = "Votre nationalite doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre nationalite ne peut pas tre plus long que {{ limit }} caractres"
     * )
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
     * @Assert\Length(
     *      min = "0",
     *      max = "150",
     *      minMessage = "Votre numero d'identite doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre numero d'identite ne peut pas tre plus long que {{ limit }} caractres"
     * )
     *
     * @ORM\Column(name="numero_Identite", type="string", length=255, unique=true)
     */
    private $numeroIdentite;
    
    /**
     * @var string
     *
     *
     * @Assert\Length(
     *      min = "0",
     *      max = "50",
     *      minMessage = "Votre numero de passeport doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre numero de passeport ne peut pas tre plus long que {{ limit }} caractres"
     * )
     *
     * @ORM\Column(name="num_passport", type="string", length=255, unique=true, nullable=true)
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
     * @Assert\Length(
     *      min = "2",
     *      max = "150",
     *      minMessage = "Votre pays doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre pays ne peut pas tre plus long que {{ limit }} caractres"
     * )
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
     * @Assert\Length(
     *      min = "2",
     *      max = "250",
     *      minMessage = "Votre adresse doit faire au moins {{ limit }} caractres",
     *      maxMessage = "Votre adresse ne peut pas tre plus long que {{ limit }} caractres"
     * )
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
     * 
     *
     * @ORM\Column(name="num_permisConduire", type="string", length=255, unique=true, nullable=true)
     */
    private $numPermisConduire;

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
     * Constructor
     */
    public function __construct()
    
    {
    	parent::__construct();
        $this->poste = new \Doctrine\Common\Collections\ArrayCollection();
        $this->langue = new \Doctrine\Common\Collections\ArrayCollection();
        $this->experience = new \Doctrine\Common\Collections\ArrayCollection();
        $this->formation = new \Doctrine\Common\Collections\ArrayCollection();
        $this->competence = new \Doctrine\Common\Collections\ArrayCollection();
        $this->centreInteret = new \Doctrine\Common\Collections\ArrayCollection();
        $this->matricule='000';
        
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
     * Set nom
     *
     * @param string $nom
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * Set mail
     *
     * @param string $mail
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set numPermisConduire
     *
     * @param string $numPermisConduire
     * @return User
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
     * Set niveauEtude
     *
     * @param string $niveauEtude
     * @return User
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
     * Set profession
     *
     * @param string $profession
     * @return User
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
     * @return User
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
     * Add poste
     *
     * @param \Interim\RecruteBundle\Entity\Poste $poste
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * Set cv
     *
     * @param \Interim\RecruteBundle\Entity\Image $cv
     * @return User
     */
    public function setCv(\Interim\RecruteBundle\Entity\Image $cv = null)
    {
        $this->cv = $cv;

        return $this;
    }

    /**
     * Get cv
     *
     * @return \Interim\RecruteBundle\Entity\Image 
     */
    public function getCv()
    {
        return $this->cv;
    }

    /**
     * Set image
     *
     * @param \Interim\RecruteBundle\Entity\Image $image
     * @return User
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
     * Set prenom
     *
     * @param string $prenom
     * @return User
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
     * Set matricule
     *
     * @param string $matricule
     * @return User
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
}
