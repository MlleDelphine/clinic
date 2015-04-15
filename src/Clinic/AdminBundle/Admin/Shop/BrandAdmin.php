<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 14/04/2015
 * Time: 14:14
 */
namespace Clinic\AdminBundle\Admin\Shop;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class BrandAdmin extends Admin{

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Nom'))
            ->add('picture', "sonata_media_type", array('provider' => 'sonata.media.provider.image', 'context' => 'default', 'required' => false, 'label' => 'Image :'))
            ->add('description') // if no type is specified, SonataAdminBundle tries to guess it
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
            ->addIdentifier('id')
            ->add('title')
            ->add('slug')
            ->add('description')
            ->add('created')
        ;
    }
}