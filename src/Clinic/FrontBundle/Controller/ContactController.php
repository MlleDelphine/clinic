<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 08/04/2015
 * Time: 13:51
 */

namespace Clinic\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ContactController extends Controller{

    public function indexAction()
    {
        return $this->render('ClinicFrontBundle:Contact:index.html.twig');
    }
}