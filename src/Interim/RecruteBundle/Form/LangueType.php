<?php

namespace Interim\RecruteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LangueType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('langue','choice',array('choices' =>array('FR'=>'Francais', 'AR' => 'Arabe'),'required' => false, 'label' => 'Langue :'))
            ->add('niveau',array('choices' =>array('D'=>'Debutant', 'I' => 'Intermediaire', 'E' => 'Excellent'),'required' => false, 'label' => 'Niveau :'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\RecruteBundle\Entity\Langue'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_recrutebundle_langue';
    }
}
