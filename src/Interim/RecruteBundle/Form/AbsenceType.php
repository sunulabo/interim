<?php

namespace Interim\RecruteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AbsenceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDepart')
            ->add('dateRetour')
            ->add('objet')
            ->add('etat')
            ->add('commentaire')
            ->add('nbrejour')
            ->add('commentaireRH')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\RecruteBundle\Entity\Absence'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_recrutebundle_absence';
    }
}
