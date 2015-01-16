<?php

namespace Recrut\ErecrutementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExperienceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut')
            ->add('dateFin')
            ->add('intitulePoste')
            ->add('entreprise')
            ->add('description')
            ->add('categorie')
            ->add('lieu')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recrut\ErecrutementBundle\Entity\Experience'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recrut_erecrutementbundle_experience';
    }
}
