<?php
namespace Recover\UserBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\FixtureInterface; 
use Doctrine\Common\Persistence\ObjectManager;
use Recover\UserBundle\Entity\User;
class Users implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		// Les noms d'utilisateurs à créer
		$noms = array('Ahmed', 'Ben', 'Sidy');
		foreach ($noms as $i => $nom) 
		{ 
			// On crée l'utilisateur 
			$users[$i] = new User;
			// Le nom d'utilisateur et le mot de passe sont identiques
			$users[$i]->setUsername($nom); 
			$users[$i]->setPassword($nom);
			// Le sel et les rôles sont vides pour l'instant
			$users[$i]->setSalt(''); 
			$users[$i]->setRoles(array());
			$users[$i]->setNom('Seye');
			$users[$i]->setPrenom('Ahmed');
			$users[$i]->setProfession('Ingenieur');
			$users[$i]->setTelephone('+221775505046');
			$users[$i]->setEmail('absbseye@gmail.com'.$i);
			// On le persiste
			$manager->persist($users[$i]); 
		}
			// On déclenche l'enregistrement
			$manager->flush(); 
	}
}