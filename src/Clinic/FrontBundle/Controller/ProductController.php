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
        $catRepo = $em->getRepository('ClinicFrontBundle:ProductCategory');
        $productRepo = $em->getRepository('ClinicFrontBundle:Product');
        $categories = $catRepo->findAll();

        $categoriesProducts = array();

        foreach($categories as $category){
            $categoriesProducts[$category->getId()] = array('category' => $category,
                'products' => $productRepo->getProductsByCategory($category));
        }

        return $this->render('ClinicFrontBundle:Product:index.html.twig', array('categoriesProducts' => $categoriesProducts));
    }


}