<?php

namespace Recover\ErecoverBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SocieteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SocieteRepository extends EntityRepository
{
	/* public function findByUser($user)
	{
		$query =$this->createQueryBuilder('a')
					 #->leftJoin('a.users' ,'users')
					 #->addSelect('users')
					 #->where('a.users = :users')
					 #->setParameter('societe', $societe)
					 #->setParameter('users', $user)
					 ->getQuery();
	     return $query->getResult();
	} */
}