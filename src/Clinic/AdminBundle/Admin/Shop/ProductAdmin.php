<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 15/04/2015
 * Time: 15:30
 */

namespace Clinic\AdminBundle\Admin\Shop;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProductAdmin extends Admin{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $queryPC = $this->modelManager->getEntityManager('Clinic\FrontBundle\Entity\ProductCategory')
            ->createQuery('SELECT pc FROM ClinicFrontBundle:ProductCategory pc ORDER BY pc.title ASC');

        $queryB = $this->modelManager->getEntityManager('Clinic\FrontBundle\Entity\Brand')
            ->createQuery('SELECT b FROM ClinicFrontBundle:Brand b ORDER BY b.title ASC');



        $formMapper
            ->add('title', 'text', array('label' => 'Nom'))
            ->add('category', "sonata_type_model", array('query' => $queryPC, 'multiple' => false, 'compound' => false, 'expanded' => false))
            ->add('brand', "sonata_type_model", array('query' => $queryB, 'multiple' => false, 'compound' => false, 'expanded' => false))
            ->add('picture', "sonata_media_type", array('provider' => 'sonata.media.provider.image',
                'context' => 'default',
                'data_class'   =>  'Application\Sonata\MediaBundle\Entity\Media',
                'required' => false,
                'label' => 'Image :'))
            ->add('description')
            ->add('price')
            ->add('published')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('description')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('title')
            ->add('category')
            ->add('brand')
            ->add('picture', null, array("label" => "Image"))
            ->add('description')
            ->add('price')
            ->add('published')
            ->add('created')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array()
                )));

    }
}