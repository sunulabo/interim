<?php

namespace Recover\ErecoverBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PaysType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code','text', array('attr' => array('placeholder' => 'Code Pays')))
            ->add('nom','text', array('attr' => array('placeholder' => 'Nom Pays')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recover\ErecoverBundle\Entity\Pays'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recover_erecoverbundle_pays';
    }
}
