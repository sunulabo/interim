<?php

namespace Interim\RecruteBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class InterimaireType extends AbstractType
{
	/**
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     *
     *
     *
     *
     */
    
	
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matricule','text' , array('label' => 'Matricule'))
            ->add('prenom','text' , array('label' => 'Prenom'))
            ->add('nom','text' , array('label' => 'Nom'))
            ->add('dateNaissance' ,'birthday', array('label' => 'Date de naissance'))
            ->add('lieuNaissance','text' , array('label' => 'Lieu de naissance'))
            ->add('nationalite' ,'text' , array('label' => 'Nationalite'))
            ->add('numeroIdentite' ,'text' , array('label' => 'Numero Identite'))
            ->add('numPassport','text' , array('label' => 'Numero de PassPort'))
            ->add('sexe' , 'choice', array('choices'   => array('m' => 'Masculin', 'f' => 'Fminin'),
    'required'  => true ,'expanded'=>true,'multiple'=>false,'data'=>'m') ) 
            ->add('situationMatrimoniale' , 'choice', array('choices'   => array('m' => 'Marie', 'C' => 'Celibataire', 'D' => 'Divorce', 'D' => 'Veuf'),
    'required'  => false ))
            ->add('nbFemme' ,'text' , array('label' => 'Nombre de Femme'))
            ->add('nbEnfant' ,'text' , array('label' => 'Nombre enfant'))
            ->add('region' ,'text' , array('label' => 'Region') )
            ->add('ville')
            ->add('pays' ,'country')
            ->add('civilite' , 'choice', array('choices'   => array('Mr' => 'Monsieur', 'Mme' => 'Madame', 'Aut' => 'Autre') ))
            ->add('adresse' ,'textarea' )
            ->add('telFixe'  ,'text' , array('label' => 'Telephone Fixe'))
            ->add('telMobile' ,'text' , array('label' => 'Telephone mobile' ))
            ->add('fax' ,'text' , array('label' => 'Faxe' ))
            ->add('email' ,'language')
            ->add('numPermisConduire' ,'text' , array('label' => 'Numero Permis de Conduire' ))
            ->add('numPortArme','text' , array('label' => 'Numero Port Arme'))
            ->add('niveauEtude'  ,'text' , array('label' => 'Niveau Etude'))
            ->add('artMartial' , 'choice', array('choices'   => array('n' => 'Nom', 'o' => 'Oui'),'required'  => false ))
            ->add('profession' ,'text' , array('label' => 'Profession'))
            ->add('qualification' ,'text' , array('label' => 'Qualification'))
            ->add('cv',new ImageType() , array('label' => 'CV'))
            #->add('cv',new UserType() , array('label' => 'CV'))
            ->add('image',new ImageType() , array('label' => 'Photo'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Interim\RecruteBundle\Entity\Personne'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interim_recrutebundle_personne';
    }
}
