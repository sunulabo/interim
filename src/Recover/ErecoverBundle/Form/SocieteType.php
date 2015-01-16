<?php

namespace Recover\ErecoverBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocieteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('raisoc' ,null, array('attr' => array('placeholder' => 'Raison Social')))
            ->add('telephone','text', array('attr' => array('placeholder' => 'Telephone')))
            ->add('adresse','text', array('attr' => array('placeholder' => 'Adresse')))
            ->add('siteweb','text', array('attr' => array('placeholder' => 'Site Web')))
            ->add('email','text', array('attr' => array('placeholder' => 'Email')))
            ->add('fax','text', array('attr' => array('placeholder' => 'Fax')))
            ->add('capital','money',array('currency'=>'XOF','label' => 'Capital en CFA'))
            ->add('rc','text', array('attr' => array('placeholder' => 'Numero RC')))
            ->add('ninea','text', array('attr' => array('placeholder' => 'Numero NINEA')))
            ->add('statut','text', array('attr' => array('placeholder' => 'Statut Entreprise')))
            ->add('pays','country')
            ->add('active','checkbox',array('required' => 'false'))
            ->add('sections')
            ->add('user',null,array('label' => 'Utilisateur(s)'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recover\ErecoverBundle\Entity\Societe'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recover_erecoverbundle_societe';
    }
}
