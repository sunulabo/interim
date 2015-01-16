<?php

namespace Recover\ErecoverBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocieteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raisoc')
            ->add('telephone')
            ->add('adresse')
            ->add('siteweb')
            ->add('email','email')
            ->add('fax')
            ->add('capital')
            ->add('rc')
            ->add('ninea')
            ->add('statut')
            ->add('pays')
            ->add('sections', 'collection', array('type'=>new SectionType() ,
            									  'allow_add' =>true,
            									  'allow_delete'=>true))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recover\ErecoverBundle\Entity\Societe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recover_erecoverbundle_societe';
    }
}
