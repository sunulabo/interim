<?php

namespace Recrut\ErecrutementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RecrutErecrutementBundle:Default:index.html.twig');
    }
}
