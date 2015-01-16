<?php

namespace Recover\ErecoverBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SectionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text', array('attr' => array('placeholder' => 'Nom du Section')))
            ->add('adresse','text', array('attr' => array('placeholder' => 'Addresse')))
            ->add('telephone','text', array('attr' => array('placeholder' => 'Numero de Telephone')))
            ->add('email','text', array('attr' => array('placeholder' => 'Email')))
            ->add('fax','text', array('attr' => array('placeholder' => 'Fax')))
            #->add('societe')
        
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recover\ErecoverBundle\Entity\Section'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recover_erecoverbundle_section';
    }
}
