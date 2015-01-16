<?php

namespace Interim\RecruteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HistoriqueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntreprise')
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance')
            ->add('lieuNaissance')
            ->add('fonction')
            ->add('datedebutPeriodeConge')
            ->add('datefinPeriodeConge')
            ->add('email')
            ->add('dateDebutAbsence')
            ->add('dateFinAbsence')
            ->add('nbjAbsence')
            ->add('commentaire')
            ->add('commentaireRH')
            ->add('sanction')
            ->add('objet')
            ->add('societe')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\RecruteBundle\Entity\Historique'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_recrutebundle_historique';
    }
}
