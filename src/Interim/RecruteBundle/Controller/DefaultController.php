<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('InterimRecruteBundle:Default:index.html.twig', array('name' => $name));
    }
}
