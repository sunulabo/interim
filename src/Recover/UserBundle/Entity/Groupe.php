<?php

namespace Recover\UserBundle\Entity;

use FOS\UserBundle\Model\Group as BaseGroup;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Recover\UserBundle\Entity\GroupeRepository")
 */
class Groupe extends BaseGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected  $id;

 public function __toString()
 {
 	return $this->name;
 }
}
