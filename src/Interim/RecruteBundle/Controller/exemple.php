
blogdevphp Developpement PHP

    Accueil
    PHP
    Symfony
    CodeIgniter
    Jquery
    Outils
    Astuces
    Info
    Web

Blogdevphp
Symfony2 : Validation formulaire avec Validator
2014-01-25 symfony

Symfony 2, met à notre disposition le composant Validator, pour valider les données des formulaires. On va établir, nos propres règles afin de récupérer les données, dans de bonnes conditions.

Il va nous falloir une entité, un formulaire et un fichier où on va déterminer nos règles de validation.

Cependant, il y a une autre méthode pour déclarer ses règles de validations, par l'intermédiaire des annotations au sein même de l'entité.
L'entité

L'entité est en rapport avec le profil d'un développeur, dans le cadre d'une application de recherche d'emploi. Voilà, pour vous situer la scène, planter le décor!

Notre entité, Candidate.php se présente de cette manière :

    <?php
     
    namespace Goodjob\backend\Entity;
     
     
    use Doctrine\ORM\Mapping as ORM;
     
    /**
    * Candidate
    */
    class Candidate {
     
    /**
    * @var integer
    */
    protected $candidatId;
     
    /**
    * @var string
    */
    protected $lastName;
    /**
    * @var string
    */
    protected $firstName;
    /**
    * @var integer
    */
    protected $age;
    /**
    * @var string
    */
    protected $email;
    /**
    * @var password
    */
    protected $mdp;
    /**
    * @var string
    */
    protected $city;
    /**
    * @var integer
    */
    protected $identifiant;
    ?>

Définition de notre formulaire

Un petit rappel, pour générer un formulaire ,à partir de la console en ligne de commandes, on procède de cette manière :

    php app/console generate:doctrine:form entité

A partir des objets contenus dans notre entité, les champs du formulaire seront générés :

    <?php
     
    namespace Goodjob\Candidate\Form;
     
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolverInterface;
    use Doctrine\ORM\EntityRepository;
     
     
    class CandidateType extends AbstractType
    {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
    ->add('candidatId', 'hidden')
    ->add('lastName', 'text', array('label' => 'Votre nom', 'required' => true))
    ->add('firstName', 'text', array('label' => 'Votre prénom', 'required' => true))
    ->add('age', 'text', array('label' => 'Votre âge', 'required' => true))
    ->add('mdp', 'password', array('label' => 'Votre mot de passe', 'required' => true,'trim' => true))
    ->add('city', 'text', array('label' => 'Votre mot de passe', 'required' => true,'trim' => true))
    ->add('motivation', 'text', array('label' => 'Veuillez écrire une lettre de motivation', 'required' => true,'trim' => true))
    ->add('competences', 'entity', array(
    'class' => 'Goodjob\backend\Entity\Competence',
    'choices' => $this->getArrayCompetences(),
    'multiple' => true,
    ))
    ;
    }
     
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
    $resolver->setDefaults(array(
    'data_class' => 'Goodjob\backend\Entity\Candidate'
    ));
    }
     
    public function getName()
    {
    return 'goodjob_backend_candidatetype';
    }
    }
     
    ?>
     

Après avoir généré notre formulaire, nous allons, enfin passer, à la validation pour contrôler l'enregistrement des données.
Le fichier de validation

Ce fichier, dans le format YAML, s'intitulant validation.yml tout simplement, se situe dans resources/config/.

    Goodjob\backend\Entity\Candidate:
    properties:
    lastName:
    - NotBlank: { message: "Le nom est obligatoire" }
    firstName:
    - NotBlank: { message: "Le prénom est obligatoire" }
    age:
    - NotBlank: { message: "L'âge est obligatoire" }
    - GreaterThan:
    value: 18
    email:
    - Email:
    message: Cet email "{{ value }}" n\'est pas un email valide.
    checkMX: true
    motivation:
    - NotBlank: { message: "La lettre de motivation est obligatoire" }
    - Length: { max: 300, maxMessage: "La lettre de motivation ne doit pas faire plus de {{ limit }} caractères" }
    competences:
    - Count:
    min: 2
    minMessage: "Veuillez choisir au moins 2 compétences"

On indique par l'attribut NotBlank que le champ ne peut être vide.

Dans ce cas, un message sera affiché, celui qu'on a défini entre accolades pour le champ donné.

Pour l'âge, on a utilisé ce qu'on appelle une contrainte comparative avec GreaterThan pour indiquer que l'âge minimum est de 18 ans.

Concernant l'email, on a utilisé une contrainte, sur les chaines de caractères, une contrainte native de Symfony2 afin de vérifier le format de l'email. On peut également fixer la longueur d'une chaine, ici on l'a fixé à 300 pour la lettre de motivation. Si le texte va au-delà de la limite fixée, un message d'erreur apparaitra, avec la longueur maximale, à ne pas dépasser.

Par rapport, aux compétences, on souhaite au minimum, que deux choix soit effectués par l'utilisateur, c'est une contrainte sur les collections.
Customiser ses contraintes de validations

Des cas particuliers, peuvent se présenter à nous, qui peuvent nous inciter à faire nous-mêmes les règles de validations. Pour cela, on va utiliser le Callback, afin de créer des spécificités par rapport à un ou des champs. On va par exemple, s'assurer que l'identifiant est unique. Déjà, revenons sur notre fichier de validation et ajoutons à la suite notre méthode :

    constraints:
    - Callback:
    methods: [isUniqueId]
     

Puis, nous allons devoir déclarer l'objet ExecutionContext, au début du fichier contenant notre entité Candidate.php et cibler le champ sur lequel on va appliquer notre règle:

    <?php
     
    use Symfony\Component\Validator\ExecutionContext;
     
    /*****/
     
    public function isUniqueId(ExecutionContext $context)
    {
    if (in_array($this->getIdentifiant(), $this->getTabIdentifiant())){
    $context->addViolationAt('identifiant', "Cet identifiant est déjà enregistré en base");
    }
    }
     
    ?>

On a défini directement, dans l'entité, la contrainte qui se rapporte à l'identifiant. Vous pourrez définir, autant de méthodes, que vous voulez si le ou les champs requiert un traitement spécial
Conclusion

On a vu, ici une petite partie de ce qu'on peut faire avec le composant Validator mais c'est un bon début. Vous avez à votre disposition, de nombreuses contraintes afin de filtrer les données saisies. De plus, on peut définir ses propres règles pour répondre à nos besoins. Pour en savoir plus, c'est par ici.
Tweeter

    RSS
    Facebook
    Twitter
    Google Plus

A propos

Frantz Alexis

Bienvenue sur mon blog!

Développeur web PHP/Mysql, au parcours atypique, je suis curieux de nature. Titulaire d'une maitrise d'histoire, j'ai préféré l'écran au tableau noir.

A travers ce blog, je partage les connaissances, que j'accumule, pendant mon expérience professionnelle.

En plus, je partage également ma découverte d'outils, d'infos lues ici et là...
Partenariat

    Chez Syl

Derniers Articles

    Symfony2 : Exporter des données dans un fichier sous format CSV
    Enquête autour des salaires des développeurs PHP
    Exporter des données sous plusieurs formats avec le plugin HTML table Export

Copyright © 2014 blogdevphp.fr - Tous droits réservés
Retour en haut de page