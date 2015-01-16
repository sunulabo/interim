
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

Symfony 2, met � notre disposition le composant Validator, pour valider les donn�es des formulaires. On va �tablir, nos propres r�gles afin de r�cup�rer les donn�es, dans de bonnes conditions.

Il va nous falloir une entit�, un formulaire et un fichier o� on va d�terminer nos r�gles de validation.

Cependant, il y a une autre m�thode pour d�clarer ses r�gles de validations, par l'interm�diaire des annotations au sein m�me de l'entit�.
L'entit�

L'entit� est en rapport avec le profil d'un d�veloppeur, dans le cadre d'une application de recherche d'emploi. Voil�, pour vous situer la sc�ne, planter le d�cor!

Notre entit�, Candidate.php se pr�sente de cette mani�re :

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

D�finition de notre formulaire

Un petit rappel, pour g�n�rer un formulaire ,� partir de la console en ligne de commandes, on proc�de de cette mani�re :

    php app/console generate:doctrine:form entit�

A partir des objets contenus dans notre entit�, les champs du formulaire seront g�n�r�s :

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
    ->add('firstName', 'text', array('label' => 'Votre pr�nom', 'required' => true))
    ->add('age', 'text', array('label' => 'Votre �ge', 'required' => true))
    ->add('mdp', 'password', array('label' => 'Votre mot de passe', 'required' => true,'trim' => true))
    ->add('city', 'text', array('label' => 'Votre mot de passe', 'required' => true,'trim' => true))
    ->add('motivation', 'text', array('label' => 'Veuillez �crire une lettre de motivation', 'required' => true,'trim' => true))
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
     

Apr�s avoir g�n�r� notre formulaire, nous allons, enfin passer, � la validation pour contr�ler l'enregistrement des donn�es.
Le fichier de validation

Ce fichier, dans le format YAML, s'intitulant validation.yml tout simplement, se situe dans resources/config/.

    Goodjob\backend\Entity\Candidate:
    properties:
    lastName:
    - NotBlank: { message: "Le nom est obligatoire" }
    firstName:
    - NotBlank: { message: "Le pr�nom est obligatoire" }
    age:
    - NotBlank: { message: "L'�ge est obligatoire" }
    - GreaterThan:
    value: 18
    email:
    - Email:
    message: Cet email "{{ value }}" n\'est pas un email valide.
    checkMX: true
    motivation:
    - NotBlank: { message: "La lettre de motivation est obligatoire" }
    - Length: { max: 300, maxMessage: "La lettre de motivation ne doit pas faire plus de {{ limit }} caract�res" }
    competences:
    - Count:
    min: 2
    minMessage: "Veuillez choisir au moins 2 comp�tences"

On indique par l'attribut NotBlank que le champ ne peut �tre vide.

Dans ce cas, un message sera affich�, celui qu'on a d�fini entre accolades pour le champ donn�.

Pour l'�ge, on a utilis� ce qu'on appelle une contrainte comparative avec GreaterThan pour indiquer que l'�ge minimum est de 18 ans.

Concernant l'email, on a utilis� une contrainte, sur les chaines de caract�res, une contrainte native de Symfony2 afin de v�rifier le format de l'email. On peut �galement fixer la longueur d'une chaine, ici on l'a fix� � 300 pour la lettre de motivation. Si le texte va au-del� de la limite fix�e, un message d'erreur apparaitra, avec la longueur maximale, � ne pas d�passer.

Par rapport, aux comp�tences, on souhaite au minimum, que deux choix soit effectu�s par l'utilisateur, c'est une contrainte sur les collections.
Customiser ses contraintes de validations

Des cas particuliers, peuvent se pr�senter � nous, qui peuvent nous inciter � faire nous-m�mes les r�gles de validations. Pour cela, on va utiliser le Callback, afin de cr�er des sp�cificit�s par rapport � un ou des champs. On va par exemple, s'assurer que l'identifiant est unique. D�j�, revenons sur notre fichier de validation et ajoutons � la suite notre m�thode :

    constraints:
    - Callback:
    methods: [isUniqueId]
     

Puis, nous allons devoir d�clarer l'objet ExecutionContext, au d�but du fichier contenant notre entit� Candidate.php et cibler le champ sur lequel on va appliquer notre r�gle:

    <?php
     
    use Symfony\Component\Validator\ExecutionContext;
     
    /*****/
     
    public function isUniqueId(ExecutionContext $context)
    {
    if (in_array($this->getIdentifiant(), $this->getTabIdentifiant())){
    $context->addViolationAt('identifiant', "Cet identifiant est d�j� enregistr� en base");
    }
    }
     
    ?>

On a d�fini directement, dans l'entit�, la contrainte qui se rapporte � l'identifiant. Vous pourrez d�finir, autant de m�thodes, que vous voulez si le ou les champs requiert un traitement sp�cial
Conclusion

On a vu, ici une petite partie de ce qu'on peut faire avec le composant Validator mais c'est un bon d�but. Vous avez � votre disposition, de nombreuses contraintes afin de filtrer les donn�es saisies. De plus, on peut d�finir ses propres r�gles pour r�pondre � nos besoins. Pour en savoir plus, c'est par ici.
Tweeter

    RSS
    Facebook
    Twitter
    Google Plus

A propos

Frantz Alexis

Bienvenue sur mon blog!

D�veloppeur web PHP/Mysql, au parcours atypique, je suis curieux de nature. Titulaire d'une maitrise d'histoire, j'ai pr�f�r� l'�cran au tableau noir.

A travers ce blog, je partage les connaissances, que j'accumule, pendant mon exp�rience professionnelle.

En plus, je partage �galement ma d�couverte d'outils, d'infos lues ici et l�...
Partenariat

    Chez Syl

Derniers Articles

    Symfony2 : Exporter des donn�es dans un fichier sous format CSV
    Enqu�te autour des salaires des d�veloppeurs PHP
    Exporter des donn�es sous plusieurs formats avec le plugin HTML table Export

Copyright � 2014 blogdevphp.fr - Tous droits r�serv�s
Retour en haut de page