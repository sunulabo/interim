<?php

namespace Interim\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
#use Symfony\Component\Security\Core\User\UserInterface;
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


   
   
}
