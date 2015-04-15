<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 15/04/2015
 * Time: 16:09
 */

namespace Clinic\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BrandController extends Controller{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $brandRepo = $em->getRepository('ClinicFrontBundle:Brand');
        $brands = $brandRepo->findAll();

        return $this->render('ClinicFrontBundle:Brand:index.html.twig', array('brands' => $brands));
    }

}