<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('medaSysAOBundle:Default:index.html.twig', array('name' => $name));
    }
}
