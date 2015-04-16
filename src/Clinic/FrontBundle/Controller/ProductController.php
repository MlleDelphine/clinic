<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 16/04/2015
 * Time: 13:54
 */

namespace Clinic\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $productRepo = $em->getRepository('ClinicFrontBundle:Product');
        $products = $productRepo->getPublished();

        return $this->render('ClinicFrontBundle:Product:index.html.twig', array('products' => $products));
    }


}