<?php

namespace Interim\RecouvrementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RecouvrementBundle:Default:index.html.twig', array('name' => $name));
    }
}
