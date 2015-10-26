<?php

namespace Clinic\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClinicAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
