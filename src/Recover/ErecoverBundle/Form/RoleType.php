<?php

namespace Recover\ErecoverBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RoleType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('role','text', array('attr' => array('placeholder' => 'Un role ')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recover\ErecoverBundle\Entity\Role'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recover_erecoverbundle_role';
    }
}
