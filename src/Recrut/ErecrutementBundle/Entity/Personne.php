<?php

namespace Recrut\ErecrutementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Personne
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
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_naissance", type="string", length=255)
     */
    private $lieuNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=255)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_Identite", type="string", length=255)
     */
    private $numeroIdentite;

    /**
     * @var string
     *
     * @ORM\Column(name="num_passport", type="string", length=255)
     */
    private $numPassport;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     * 
    
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="situation_matrimoniale", type="string", length=255)
     */
    private $situationMatrimoniale;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_femme", type="integer")
     */
    private $nbFemme;

    /**
     * @var integer
     *
     * @ORM\Column(name="nb_enfant", type="integer")
     */
    private $nbEnfant;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=255)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="civilite", type="string", length=255)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_fixe", type="string", length=255)
     */
    private $telFixe;

    /**
     * @var string
     *
     * @ORM\Column(name="tel_mobile", type="string", length=255)
     */
    private $telMobile;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="num_permisConduire", type="string", length=255)
     */
    private $numPermisConduire;

    /**
     * @var string
     *
     * @ORM\Column(name="num_portArme", type="string", length=255)
     */
    private $numPortArme;

    /**
     * @var string
     *
     * @ORM\Column(name="niveauEtude", type="string", length=255)
     */
    private $niveauEtude;

    /**
     * @var string
     *
     * @ORM\Column(name="artMartial", type="string", length=255)
     */
    private $artMartial;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255)
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="qualification", type="string", length=255)
     */
    private $qualification;

    # les Relations entre les entites 

    /**
     * @var string
     * 
     * @ORM\OneToMany(targetEntity="Langue", cascade={"persist"})
     * 
     * @ORM\Column(name="langue", type="string", length=255)
     */
    private $langue;
    
    /**
     * @var string
     * 
     * @ORM\OneToMany(targetEntity="Experience", cascade={"persist"})
     * 
     * @ORM\Column(name="experience", type="string", length=255)
     */
    private $experience;
    /**
     * @var string
     *
     * * @ORM\OneToMany(targetEntity="Formation", cascade={"persist"})
     *
     * @ORM\Column(name="formation", type="string", length=255)
     */
    private $formation;
    
    
    /**
     * @var string
     *
     * * @ORM\OneToMany(targetEntity="Competence", cascade={"persist"})
     *
     * @ORM\Column(name="competence", type="string", length=255)
     */
    private $competence;
    
    
    
    /**
     * @var string
     *
     * * @ORM\OneToMany(targetEntity="CentreInteret", cascade={"persist"})
     *
     * @ORM\Column(name="centreInteret", type="string", length=255)
     */
    private $centreInteret;

    
    
    /**
     * @var string
     *
     * * @ORM\OneToMany(targetEntity="Poste", cascade={"persist"})
     *
     * @ORM\Column(name="poste", type="string", length=255)
     */
    private $poste;
    
    
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
     * Set langue
     *
     * @param string $langue
     * @return Personne
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string 
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set experience
     *
     * @param string $experience
     * @return Personne
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return string 
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set formation
     *
     * @param string $formation
     * @return Personne
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return string 
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set competence
     *
     * @param string $competence
     * @return Personne
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
     * @return Personne
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
     * Set poste
     *
     * @param string $poste
     * @return Personne
     */
    public function setPoste($poste)
    {
        $this->poste = $poste;

        return $this;
    }

    /**
     * Get poste
     *
     * @return string 
     */
    public function getPoste()
    {
        return $this->poste;
    }
}
