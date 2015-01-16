<?php

namespace Interim\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    
	
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		
		->add('sexe')
		->add('nationalite')
		->add('region')
		->add('ville')
		->add('pays')
		
		;
	}
	
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_userbundle_user';
    }
}
