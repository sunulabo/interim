<?php

namespace Interim\RecruteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Interim\RecruteBundle\Entity\AbsenceRepository")
 */
class Absence
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateDepart", type="datetime")
     */
    private $dateDepart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetour", type="datetime")
     */
    private $dateRetour;

    /**
     * @var string
     *
     * @ORM\Column(name="objet", type="string", length=255)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbrejour", type="integer")
     */
    private $nbrejour;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaireRH", type="string", length=255)
     */
    private $commentaireRH;


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
     * Set dateDepart
     *
     * @param \DateTime $dateDepart
     * @return Absence
     */
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get dateDepart
     *
     * @return \DateTime 
     */
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set dateRetour
     *
     * @param \DateTime $dateRetour
     * @return Absence
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;

        return $this;
    }

    /**
     * Get dateRetour
     *
     * @return \DateTime 
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * Set objet
     *
     * @param string $objet
     * @return Absence
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
     * Set etat
     *
     * @param string $etat
     * @return Absence
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

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Absence
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
     * Set nbrejour
     *
     * @param integer $nbrejour
     * @return Absence
     */
    public function setNbrejour($nbrejour)
    {
        $this->nbrejour = $nbrejour;

        return $this;
    }

    /**
     * Get nbrejour
     *
     * @return integer 
     */
    public function getNbrejour()
    {
        return $this->nbrejour;
    }

    /**
     * Set commentaireRH
     *
     * @param string $commentaireRH
     * @return Absence
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
}
