<?php

namespace Interim\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Model\UserInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Interim\UserBundle\Entity\User;
use Interim\UserBundle\Form\UserType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{

	
	
	/**
	 * Lists all entities.
	 * @return Response
	 */
	public function indexAction()
	{
		$em = $this->getDoctrine()->getManager();
		
		$entities = $em->getRepository('InterimUserBundle:User')->findAll();
		
		return $this->render('InterimUserBundle:User:index.html.twig', array(
				'entities' => $entities,
		));
		                
	}
    
   
    
    
    
    
    
    
   
}
