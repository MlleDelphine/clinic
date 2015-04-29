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

        $queryA = $this->modelManager->getEntityManager('Clinic\FrontBundle\Entity\Animal')
            ->createQuery('SELECT a FROM ClinicFrontBundle:Animal a ORDER BY a.title ASC');



        $formMapper
            ->add('title', 'text', array('label' => 'Nom'))
            ->add('category', "sonata_type_model", array('query' => $queryPC, 'multiple' => false, 'compound' => false, 'expanded' => false))
            ->add('brand', "sonata_type_model", array('query' => $queryB, 'multiple' => false, 'compound' => false, 'expanded' => false))
            ->add('animals', "sonata_type_model", array('query' => $queryA, 'multiple' => true, 'compound' => true, 'expanded' => true))
            ->add('picture', "clinic_media_type", array('provider' => 'sonata.media.provider.image',
                'context' => 'product_media',
                'data_class'   =>  'Clinic\MediaBundle\Entity\Media',
                'required' => false,
                'label' => 'Image :'))
            ->add('description', 'genemu_tinymce', array(
                'required'=>true, // si required true, champ hidden créé par tiny non rempli, formulaire invalidable
                'label'=>'Description :',
                'configs' => array(
                    'entity_encoding'=>'raw',
                    'plugins' => 'bbcode',
                )))
            ->add('price', null, array('label' => 'Prix : ', 'required' => false))
            ->add('published', null, array('label' => 'Publié : ', 'required' => false))
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