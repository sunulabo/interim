<?php

namespace Recover\ErecoverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Facture
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Recover\ErecoverBundle\Entity\FactureRepository")
 */
class Facture
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
     * @ORM\Column(name="numero", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $numero;

    /**
     * @var integer
     *
     * @ORM\Column(name="montantht", type="integer")
     * @Assert\NotBlank()
     */
    private $montantht;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateedition", type="datetime")
     * 
     */
    private $dateedition;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateecheance", type="datetime")
     *
     */
    private $dateecheance;
    
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Recover\ErecoverBundle\Entity\Societe")
     * @Assert\NotBlank()
     */
    private $societe;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Recover\ErecoverBundle\Entity\Etat")
     * @Assert\NotBlank()
     */
    private $etat;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Recover\ErecoverBundle\Entity\Tva")
     * @Assert\NotBlank()
     */
    private $tva;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="Recover\ErecoverBundle\Entity\Image" , cascade={"persist","remove"})
     * @Assert\Valid()
     */
    private $image;


    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tva = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dateedition = new \DateTime;
        $this->dateecheance = new \DateTime;
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
     * Set numero
     *
     * @param string $numero
     * @return Facture
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get numero
     *
     * @return string 
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set montantht
     *
     * @param integer $montantht
     * @return Facture
     */
    public function setMontantht($montantht)
    {
        $this->montantht = $montantht;

        return $this;
    }

    /**
     * Get montantht
     *
     * @return integer 
     */
    public function getMontantht()
    {
        return $this->montantht;
    }

    /**
     * Set dateedition
     *
     * @param \DateTime $dateedition
     * @return Facture
     */
    public function setDateedition($dateedition)
    {
        $this->dateedition = $dateedition;

        return $this;
    }

    /**
     * Get dateedition
     *
     * @return \DateTime 
     */
    public function getDateedition()
    {
        return $this->dateedition;
    }

    /**
     * Set societe
     *
     * @param \Recover\ErecoverBundle\Entity\Societe $societe
     * @return Facture
     */
    public function setSociete(\Recover\ErecoverBundle\Entity\Societe $societe = null)
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * Get societe
     *
     * @return \Recover\ErecoverBundle\Entity\Societe 
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * Set etat
     *
     * @param \Recover\ErecoverBundle\Entity\Etat $etat
     * @return Facture
     */
    public function setEtat(\Recover\ErecoverBundle\Entity\Etat $etat = null)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return \Recover\ErecoverBundle\Entity\Etat 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Add tva
     *
     * @param \Recover\ErecoverBundle\Entity\Tva $tva
     * @return Facture
     */
    public function addTva(\Recover\ErecoverBundle\Entity\Tva $tva)
    {
        $this->tva[] = $tva;

        return $this;
    }

    /**
     * Remove tva
     *
     * @param \Recover\ErecoverBundle\Entity\Tva $tva
     */
    public function removeTva(\Recover\ErecoverBundle\Entity\Tva $tva)
    {
        $this->tva->removeElement($tva);
    }

    /**
     * Get tva
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set image
     *
     * @param \Recover\ErecoverBundle\Entity\Image $image
     * @return Facture
     */
    public function setImage(\Recover\ErecoverBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \Recover\ErecoverBundle\Entity\Image 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set dateecheance
     *
     * @param \DateTime $dateecheance
     * @return Facture
     */
    public function setDateecheance($dateecheance)
    {
        $this->dateecheance = $dateecheance;

        return $this;
    }

    /**
     * Get dateecheance
     *
     * @return \DateTime 
     */
    public function getDateecheance()
    {
        return $this->dateecheance;
    }
}
