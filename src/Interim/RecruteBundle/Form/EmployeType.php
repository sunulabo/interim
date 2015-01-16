<?php

namespace Interim\RecruteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmployeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salairenet')
            ->add('dateEmbauche')
            ->add('nbreJourConge')
            ->add('matricule')
            ->add('fonction')
            ->add('datefinContrat')
            ->add('datedebutContrat')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\RecruteBundle\Entity\Employe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_recrutebundle_employe';
    }
}
