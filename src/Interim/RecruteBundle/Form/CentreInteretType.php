<?php

namespace Interim\RecruteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CentreInteretType extends AbstractType
{
    /**
     * 
     * 
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * 
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('commentaire')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\RecruteBundle\Entity\CentreInteret'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_recrutebundle_centreinteret';
    }
}
