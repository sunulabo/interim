<?php

namespace Interim\RecruteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PosteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('dateLimite')
            ->add('dateFonction')
            ->add('salaire')
            ->add('avantage')
            ->add('tache')
            ->add('mission')
            ->add('objectif')
            ->add('societe')
            ->add('critere')
            ->add('competence')
            ->add('centreInteret')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\RecruteBundle\Entity\Poste'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_recrutebundle_poste';
    }
}
