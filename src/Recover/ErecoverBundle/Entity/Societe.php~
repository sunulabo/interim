<?php

namespace Recover\ErecoverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Societe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Recover\ErecoverBundle\Entity\SocieteRepository")
 */
class Societe
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
     *@Assert\NotBlank(message = " Ce champ ne doit pas etre vide.")
     * @ORM\Column(name="raisoc", type="string", length=255)
     */
    private $raisoc;

    /**
     * @var string
     * @Assert\NotBlank(message = " Ce champ ne doit pas etre vide.")
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     */
    private $telephone;

    /**
     * @var string
     * @Assert\NotBlank(message = " Adresse ne doit pas etre vide.")
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     *
     * @ORM\Column(name="siteweb", type="string", length=30)
     */
    private $siteweb;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255)
     */
    private $fax;

    /**
     * @var integer
     *
     * @ORM\Column(name="capital", type="integer")
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="rc", type="string", length=255)
     */
    private $rc;

    /**
     * @var string
     *
     * @ORM\Column(name="ninea", type="string", length=255)
     */
    private $ninea;

    /**
     * 
     *
     * @ORM\OneToOne(targetEntity="Recover\ErecoverBundle\Entity\Statut")
     */
    private $statut;

    /**
     * @var string
     *
     * @ORM\Column(name="pays" , type="string" ,length=255)
     */
    private $pays;
    
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Recover\ErecoverBundle\Entity\Section")
     */
     
    private $sections;
    /**
     * 
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;
    
    /**
     *
     * @ORM\OneToOne(targetEntity="Recover\UserBundle\Entity\User")
     */
     
    private $user;
    
    
    


    
    
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sections = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set raisoc
     *
     * @param string $raisoc
     * @return Societe
     */
    public function setRaisoc($raisoc)
    {
        $this->raisoc = $raisoc;

        return $this;
    }

    /**
     * Get raisoc
     *
     * @return string 
     */
    public function getRaisoc()
    {
        return $this->raisoc;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Societe
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Societe
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
     * Set siteweb
     *
     * @param string $siteweb
     * @return Societe
     */
    public function setSiteweb($siteweb)
    {
        $this->siteweb = $siteweb;

        return $this;
    }

    /**
     * Get siteweb
     *
     * @return string 
     */
    public function getSiteweb()
    {
        return $this->siteweb;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Societe
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
     * Set fax
     *
     * @param string $fax
     * @return Societe
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
     * Set capital
     *
     * @param integer $capital
     * @return Societe
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;

        return $this;
    }

    /**
     * Get capital
     *
     * @return integer 
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * Set rc
     *
     * @param string $rc
     * @return Societe
     */
    public function setRc($rc)
    {
        $this->rc = $rc;

        return $this;
    }

    /**
     * Get rc
     *
     * @return string 
     */
    public function getRc()
    {
        return $this->rc;
    }

    /**
     * Set ninea
     *
     * @param string $ninea
     * @return Societe
     */
    public function setNinea($ninea)
    {
        $this->ninea = $ninea;

        return $this;
    }

    /**
     * Get ninea
     *
     * @return string 
     */
    public function getNinea()
    {
        return $this->ninea;
    }

    /**
     * Set pays
     *
     * @param string $pays
     * @return Societe
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
     * Set active
     *
     * @param boolean $active
     * @return Societe
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set statut
     *
     * @param \Recover\ErecoverBundle\Entity\Statut $statut
     * @return Societe
     */
    public function setStatut(\Recover\ErecoverBundle\Entity\Statut $statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \Recover\ErecoverBundle\Entity\Statut 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Add sections
     *
     * @param \Recover\ErecoverBundle\Entity\Section $sections
     * @return Societe
     */
    public function addSection(\Recover\ErecoverBundle\Entity\Section $sections)
    {
        $this->sections[] = $sections;

        return $this;
    }

    /**
     * Remove sections
     *
     * @param \Recover\ErecoverBundle\Entity\Section $sections
     */
    public function removeSection(\Recover\ErecoverBundle\Entity\Section $sections)
    {
        $this->sections->removeElement($sections);
    }

    /**
     * Get sections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Set user
     *
     * @param \Recover\UserBundle\Entity\User $user
     * @return Societe
     */
    public function setUser(\Recover\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Recover\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    public function __toString()
    {
    	return $this->raisoc;
    }
}
