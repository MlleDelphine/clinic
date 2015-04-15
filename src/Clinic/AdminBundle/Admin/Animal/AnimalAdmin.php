<?php
/**
 * Created by PhpStorm.
 * User: Delphine
 * Date: 15/04/2015
 * Time: 13:33
 */
namespace Clinic\AdminBundle\Admin\Animal;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


class AnimalAdmin extends Admin {


    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Nom :'))
            ->add('fontcode', 'text', array('label' => 'Code police :'))
            ->add('description') // if no type is specified, SonataAdminBundle tries to guess it
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('fontcode')
            ->add('description')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('title')
            ->add('fontcode')
            ->add('description')
        ;
    }
}