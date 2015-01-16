<?php

namespace Recover\ErecoverBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom','text', array('attr' => array('placeholder' => 'Nom Utilisateur ')))
            ->add('prenom','text', array('attr' => array('placeholder' => 'Prenom Utilisateur ')))
            ->add('profession','text', array('attr' => array('placeholder' => 'Profession ')))
            ->add('telephone','text', array('attr' => array('placeholder' => 'Numero Telephone')))
            ->add('email','text', array('attr' => array('placeholder' => 'email ')))
            ->add('role','text', array('attr' => array('placeholder' => 'Role ')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recover\ErecoverBundle\Entity\Utilisateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recover_erecoverbundle_utilisateur';
    }
}
