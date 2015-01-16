<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 *
 * @ORM\Table(name="historiques")
 * @ORM\Entity(repositoryClass="Interim\RecruteBundle\Entity\HistoriqueRepository")
 */
class Historique
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
     * @ORM\Column(name="nomEntreprise", type="string", length=255)
     */
    private $nomEntreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="dateNaissance", type="string", length=255)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lieuNaissance", type="string", length=255)
     */
    private $lieuNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction", type="string", length=255)
     */
    private $fonction;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebutPeriodeConge", type="date")
     */
    private $datedebutPeriodeConge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefinPeriodeConge", type="date")
     */
    private $datefinPeriodeConge;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutAbsence", type="date")
     */
    private $dateDebutAbsence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinAbsence", type="date")
     */
    private $dateFinAbsence;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbjAbsence", type="integer")
     */
    private $nbjAbsence;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireRH", type="string", length=255)
     */
    private $commentaireRH;

    /**
     * @var string
     *
     * @ORM\Column(name="sanction", type="string", length=255)
     */
    private $sanction;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255)
     */
    private $societe;


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
     * Set nomEntreprise
     *
     * @param string $nomEntreprise
     * @return Historique
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get nomEntreprise
     *
     * @return string 
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Historique
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
     * Set prenom
     *
     * @param string $prenom
     * @return Historique
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
     * Set dateNaissance
     *
     * @param string $dateNaissance
     * @return Historique
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return string 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set lieuNaissance
     *
     * @param string $lieuNaissance
     * @return Historique
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
     * Set fonction
     *
     * @param string $fonction
     * @return Historique
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
     * Set datedebutPeriodeConge
     *
     * @param \DateTime $datedebutPeriodeConge
     * @return Historique
     */
    public function setDatedebutPeriodeConge($datedebutPeriodeConge)
    {
        $this->datedebutPeriodeConge = $datedebutPeriodeConge;

        return $this;
    }

    /**
     * Get datedebutPeriodeConge
     *
     * @return \DateTime 
     */
    public function getDatedebutPeriodeConge()
    {
        return $this->datedebutPeriodeConge;
    }

    /**
     * Set datefinPeriodeConge
     *
     * @param \DateTime $datefinPeriodeConge
     * @return Historique
     */
    public function setDatefinPeriodeConge($datefinPeriodeConge)
    {
        $this->datefinPeriodeConge = $datefinPeriodeConge;

        return $this;
    }

    /**
     * Get datefinPeriodeConge
     *
     * @return \DateTime 
     */
    public function getDatefinPeriodeConge()
    {
        return $this->datefinPeriodeConge;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Historique
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
     * Set dateDebutAbsence
     *
     * @param \DateTime $dateDebutAbsence
     * @return Historique
     */
    public function setDateDebutAbsence($dateDebutAbsence)
    {
        $this->dateDebutAbsence = $dateDebutAbsence;

        return $this;
    }

    /**
     * Get dateDebutAbsence
     *
     * @return \DateTime 
     */
    public function getDateDebutAbsence()
    {
        return $this->dateDebutAbsence;
    }

    /**
     * Set dateFinAbsence
     *
     * @param \DateTime $dateFinAbsence
     * @return Historique
     */
    public function setDateFinAbsence($dateFinAbsence)
    {
        $this->dateFinAbsence = $dateFinAbsence;

        return $this;
    }

    /**
     * Get dateFinAbsence
     *
     * @return \DateTime 
     */
    public function getDateFinAbsence()
    {
        return $this->dateFinAbsence;
    }

    /**
     * Set nbjAbsence
     *
     * @param integer $nbjAbsence
     * @return Historique
     */
    public function setNbjAbsence($nbjAbsence)
    {
        $this->nbjAbsence = $nbjAbsence;

        return $this;
    }

    /**
     * Get nbjAbsence
     *
     * @return integer 
     */
    public function getNbjAbsence()
    {
        return $this->nbjAbsence;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Historique
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set commentaireRH
     *
     * @param string $commentaireRH
     * @return Historique
     */
    public function setCommentaireRH($commentaireRH)
    {
        $this->commentaireRH = $commentaireRH;

        return $this;
    }

    /**
     * Get commentaireRH
     *
     * @return string 
     */
    public function getCommentaireRH()
    {
        return $this->commentaireRH;
    }

    /**
     * Set sanction
     *
     * @param string $sanction
     * @return Historique
     */
    public function setSanction($sanction)
    {
        $this->sanction = $sanction;

        return $this;
    }

    /**
     * Get sanction
     *
     * @return string 
     */
    public function getSanction()
    {
        return $this->sanction;
    }

    /**
     * Set objet
     *
     * @param string $objet
     * @return Historique
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return string 
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set societe
     *
     * @param string $societe
     * @return Historique
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
}
