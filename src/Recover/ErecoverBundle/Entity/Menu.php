<?php

namespace Recover\ErecoverBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Menu
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Recover\ErecoverBundle\Entity\MenuRepository")
 */
class Menu
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
     * @ORM\Column(name="menu", type="string", length=255)
     */
    private $menu;
    
    /**
     *@Assert\NotBlank()
     *
     * @ORM\ManyToMany(targetEntity="Recover\ErecoverBundle\Entity\Rubrique")
     */
    private $rubrique;


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
     * Set menu
     *
     * @param string $menu
     * @return Menu
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return string 
     */
    public function getMenu()
    {
        return $this->menu;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rubrique = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rubrique
     *
     * @param \Recover\ErecoverBundle\Entity\Rubrique $rubrique
     * @return Menu
     */
    public function addRubrique(\Recover\ErecoverBundle\Entity\Rubrique $rubrique)
    {
        $this->rubrique[] = $rubrique;

        return $this;
    }

    /**
     * Remove rubrique
     *
     * @param \Recover\ErecoverBundle\Entity\Rubrique $rubrique
     */
    public function removeRubrique(\Recover\ErecoverBundle\Entity\Rubrique $rubrique)
    {
        $this->rubrique->removeElement($rubrique);
    }

    /**
     * Get rubrique
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRubrique()
    {
        return $this->rubrique;
    }
}
