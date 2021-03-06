<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Interim\RecruteBundle\Entity\Personne;
use Interim\RecruteBundle\Form\PersonneType;
use Interim\RecruteBundle\Form\InterimaireType;

/**
 * Interimaire controller.
 *
 */
class InterimaireController extends Controller
{


	/**
	 * set datatable configs
	 *
	 * @return \Ali\DatatableBundle\Util\Datatable
	 */
	private function _datatable()
	{
		return $this->get('datatable')
		->setEntity("InterimRecruteBundle:Personne", "p")                          // replace "XXXMyBundle:Entity" by your entity
		->setFields(
				array(
						""          => 'p.matricule',
						"Civilite"          => 'p.civilite',
						"Prenom"          => 'p.prenom',
						"Nom"    => 'p.nom',                        // Declaration for fields:
						"Sexe"        => 'p.sexe',                    //      "label" => "alias.field_attribute_for_dql"
						"Telephone"          => 'p.telMobile',
						"_identifier_"  => 'p.id')                          // you have to put the identifier field without label. Do not replace the "_identifier_"
		)
		/* ->setWhere(                                                     // set your dql where statement
		 'x.address = :address',
				array('address' => 'Paris')
		)
		->setOrder("x.created", "desc")    */
		->setSearch(TRUE)                            // it's also possible to set the default order
		->setSearchFields(array(1,2,3,4,5))
		->setHasAction(true);                                           // you can disable action column from here by setting "false".
	}
	
	
	/**
	 * Grid action
	 * @return Response
	 */
	public function gridAction()
	{
		return $this->_datatable()->execute();                                      // call the "execute" method in your grid action
	}
	
	/**
	 * Lists all entities.
	 * @return Response
	 */
	public function indexAction()
	{
		$this->_datatable();                                                        // call the datatable config initializer
		return $this->render("InterimRecruteBundle:Interimaire:index.html.twig");                 // replace "XXXMyBundle:Module:index.html.twig" by yours
	}
    /**
     * Creates a new Interimaire entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Personne();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('interimaire_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:Interimaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Interimaire  entity.
     *
     * @param Personne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Personne $entity)
    {
        $form = $this->createForm(new InterimaireType(), $entity, array(
            'action' => $this->generateUrl('interimaire_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Personne entity.
     *
     */
    public function newAction()
    {
        $entity = new Personne();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:Interimaire:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Personne entity.
     *
     */
    public function showAction($matricule)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Personne')->find($matricule);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Interimaire entity.');
        }

        $deleteForm = $this->createDeleteForm($matricule);

        return $this->render('InterimRecruteBundle:Interimaire:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Personne entity.
     *
     */
    public function editAction($matricule)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Personne')->find($matricule);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personne entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($matricule);

        return $this->render('InterimRecruteBundle:Interimaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Personne entity.
    *
    * @param Personne $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Personne $entity)
    {
        $form = $this->createForm(new InterimaireType(), $entity, array(
            'action' => $this->generateUrl('interimaire_update', array('matricule' => $entity->getMatricule())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Personne entity.
     *
     */
    public function updateAction(Request $request, $matricule)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Personne')->find($matricule);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personne entity.');
        }

        $deleteForm = $this->createDeleteForm($matricule);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('interimaire_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:Interimaire:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Personne entity.
     *
     */
    public function deleteAction(Request $request, $matricule)
    {
        $form = $this->createDeleteForm($matricule);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:Personne')->find($maricule);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personne entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('interimaire'));
    }

    /**
     * Creates a form to delete a Personne entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($matricule)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('interimaire_delete', array('matricule' => $matricule)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
