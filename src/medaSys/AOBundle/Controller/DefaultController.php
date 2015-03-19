<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;



class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('medaSysAOBundle:Default:index.html.twig', array('name' => $name));
    }
    public function testAction($name='test')
    {
        return new Response('hello '.$name);
    }

}
