<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 10/04/2015
 * Time: 14:27
 */

namespace Clinic\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HomeController extends Controller{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $animalRepo = $em->getRepository('ClinicFrontBundle:Animal');
        $animals = $animalRepo->findAll();


        return $this->render('ClinicFrontBundle:Home:index.html.twig', array('animals' => $animals));
    }

}