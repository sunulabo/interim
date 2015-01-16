<?php

namespace Recrut\E_RecrutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RecrutE_RecrutBundle:Default:index.html.twig', array('name' => $name));
    }
}
