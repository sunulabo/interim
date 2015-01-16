<?php

namespace MyApp\FilmothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$message = "Mon premier message";
    
        return $this->render('MyAppFilmothequeBundle:Default:index.html.twig', array('message' => $message));
    }
}
