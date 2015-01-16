<?php

namespace Interim\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupeType extends AbstractType
{
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\UserBundle\Entity\Groupe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_userbundle_groupe';
    }
}
