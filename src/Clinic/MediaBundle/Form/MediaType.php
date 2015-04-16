<?php

namespace Clinic\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of MediaType
 *
 * @author Nicolas de Marqué <nicolas.demarque@gmail.com>
 */
class MediaType extends \Sonata\MediaBundle\Form\Type\MediaType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
    }
    
    public function getParent()
    {
        return 'sonata_media_type';
    }
    /**
     * @return string
     */
    public function getName()
    {
        return 'clinic_media_type';
    }

}
