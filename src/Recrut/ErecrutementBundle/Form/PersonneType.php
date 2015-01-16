<?php

namespace Recrut\ErecrutementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonneType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('dateNaissance')
            ->add('lieuNaissance')
            ->add('nationalite')
            ->add('numeroIdentite')
            ->add('numPassport')
            ->add('sexe', 'choice', array('choices' => array('F'=>'Feminin','M'=>'Masculin')))
            ->add('situationMatrimoniale', 'choice', array('choices' => array('M'=>'Marie','C'=>'Celibataire','D'=>'Divorce','V'=>'Veuf')))
            ->add('nbFemme')
            ->add('nbEnfant')
            ->add('region')
            ->add('ville')
            ->add('pays')
            ->add('civilite','choice', array('choices' => array('Mr'=>'Monsieur','Mme'=>'Madame')))
            ->add('adresse')
            ->add('telFixe')
            ->add('telMobile')
            ->add('fax')
            ->add('email')
            ->add('numPermisConduire')
            ->add('numPortArme')
            ->add('niveauEtude')
            ->add('artMartial')
            ->add('profession')
            ->add('qualification')
            ->add('langue')
            ->add('experience')
            ->add('formation')
            ->add('competence')
            ->add('centreInteret')
            ->add('poste')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Recrut\ErecrutementBundle\Entity\Personne'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'recrut_erecrutementbundle_personne';
    }
}
