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

    public function productsAction($slug){
        $em = $this->getDoctrine()->getManager();
        $catRepo = $em->getRepository('ClinicFrontBundle:ProductCategory');
        $brandRepo = $em->getRepository("ClinicFrontBundle:Brand");
        $productRepo = $em->getRepository("ClinicFrontBundle:Product");

        $brand = $brandRepo->findOneBy(array('slug' => $slug));

        $categories = $catRepo->getCategoriesByBrand($brand);

        $categoriesProducts = array();

        foreach($categories as $category){
            $categoriesProducts[$category->getId()] = array('category' => $category,
                                                            'products' => $productRepo->getProductsByBrandAndCategory($brand, $category));
        }

        return $this->render('ClinicFrontBundle:Brand:products.html.twig', array('brand' => $brand, 'categoriesProducts' => $categoriesProducts));
    }

}