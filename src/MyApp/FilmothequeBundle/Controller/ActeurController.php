<?php

namespace MyApp\FilmothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyApp\FilmothequeBundle\Form\ActeurType;
use MyApp\FilmothequeBundle\Entity\Acteur;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ActeurController extends Controller
{
    public function listerAction()
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        
        $acteurs = $em->getRepository('MyAppFilmothequeBundle:Acteur')->findAll();
        #$em->
        
    	return $this->render('MyAppFilmothequeBundle:Acteur:lister.html.twig', array(
                // ...
                'acteurs' => $acteurs
                
            ));    }

    public function ajouterAction()
    {
        $acteur = new Acteur();
        $form = $this->container
        			->get('form.factory')
        			->create(new ActeurType(),$acteur);
        $message = '';  
        $request = $this->container->get('request') ;
        if ($request->getMethod() == 'POST') {
        	$form->bind($request);
        	
        	if($form->isValid()){
        		$em = $this->container->get('doctrine')->getEntityManager();
        		$em->persist($acteur);
        		$em->flush();
        		$message = 'Acteur ajouter avec succees';
        	}
        	
        }	
    	
    	return $this->render('MyAppFilmothequeBundle:Acteur:ajouter.html.twig', array(
                // ...
                'form' =>$form->createView(),
    			'message' =>$message
            ));    }

    public function modifierAction($id)
    {
        return $this->render('MyAppFilmothequeBundle:Acteur:modifier.html.twig', array(
                // ...
            ));    }

    public function supprimerAction($id)
    {
        $em = $this->container->get('doctrine')->getEntityManager();
        $acteur = $em->find('MyAppFilmothequeBundle:Acteur',$id);
        if (!$acteur){
        	throw new NotFoundHttpException("Acteur non trouver");
        }
        $em->remove($acteur);
        $em->flush();
         return new RedirectResponse($this->container->get('router')->generate('myapp_acteur_lister'));
        	
//     	return $this->render('MyAppFilmothequeBundle:Acteur:supprimer.html.twig', array(
//                 // ...
//             ));    
    }
        
      public function editerAction($id=null)
      {
      	$message = "";
      	$acteur = new Acteur();
      	$em  = $this->container
      				->get('doctrine')
      				->getEntityManager();
      	//$form = $this->container->get('form.factory')->create(new ActeurType(),$acteur);
      	//$request = $this->container->get('request');
      	if (isset($id)){
      		// modication d'un acteur existant : on recherche ses donnes
      		$acteur = $em->find('MyAppFilmothequeBundle:Acteur',$id);
      		if (!$acteur){
      			$message = 'Aucun acteur trouver';
      		}
      	    /* else {
      			$acteur = new Acteur();
      		} */
      		 
      	}
      	
     	
      		$form = $this->container->get('form.factory')->create(new ActeurType(),$acteur);
      		$request = $this->container->get('request');
      		
      		if($request->getMethod() == 'POST'){
      			$form->bind($request);
      			if ($form->isValid()){
      				$em->persist($acteur);
      				$em->flush();
      				if(isset($id)){
      					$message = "Acteur modifier avec succees";
      				}
      				else {
      					$message = "Acteur Ajouter avec succees";
      				}
      			}
      		}
      	
      	
      	return $this->render('MyAppFilmothequeBundle:Acteur:editer.html.twig', array(
      			// ...
      			'form' =>$form->createView(),
      			'message' =>$message
      	));
      }

}
