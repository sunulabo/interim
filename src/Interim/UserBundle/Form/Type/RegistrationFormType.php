<?php

namespace Interim\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Interim\RecruteBundle\Form\ImageType;
use Doctrine\Common\Collections\Expr\Value;

class RegistrationFormType extends BaseType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	parent::buildForm($builder, $options);
   
    	 $builder
    	    ->add('matricule',null,array('label' => 'Matricule'))
            ->add('prenom','text' , array('label' => 'Prenom'))
            ->add('nom','text' , array('label' => 'Nom'))
            ->add('dateNaissance' ,'date', array('label' => 'Date de naissance'))
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
           # ->add('email' ,'language')
            #->add('numPermisConduire' ,'text' , array('label' => 'Numero Permis de Conduire' ))
           # ->add('numPortArme','text' , array('label' => 'Numero Port Arme'))
            ->add('niveauEtude'  ,'text' , array('label' => 'Niveau Etude'))
          #  ->add('artMartial' , 'choice', array('choices'   => array('n' => 'Nom', 'o' => 'Oui'),'required'  => false ))
            ->add('profession' ,'text' , array('label' => 'Profession'))
            ->add('qualification' ,'text' , array('label' => 'Qualification'))
            ->add('cv',new ImageType() , array('label' => 'CV','required'  => false))
            #->add('cv',new UserType() , array('label' => 'CV'))
            ->add('image',new ImageType() , array('label' => 'Photo','required'  => false)) ;
    }
    


   
    public function getName()
    {
        return 'interim_user_registration';
    }
}
