<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
#use Bllim\Datatables\Datatables;
use Bllim\Datatables\DatatablesServiceProvider;
use Bllim\Datatables\Facade\Datatables;
use Illuminate\Support\Facades\DB;
use Interim\RecruteBundle\Entity\Societe;
use Interim\RecruteBundle\Form\SocieteType;

/**
 * Societe controller.
 *
 */
class SocieteController extends Controller
{

    /**
	 * set datatable configs
	 *
	 * @return \Ali\DatatableBundle\Util\Datatable
	 */
	private function _datatable()
	{
		return $this->get('datatable')
		->setEntity("InterimRecruteBundle:Societe", "s")                          // replace "XXXMyBundle:Entity" by your entity
		->setFields(
				array(
						""          => 's.id',
						"Nom"          => 's.nom',
						"telephone"          => 's.telephone',
						"Fax"    => 's.fax',                        // Declaration for fields:
						"Email"        => 's.email',                    //      "label" => "alias.field_attribute_for_dql"
						"Adresse"          => 's.adresse',
						"_identifier_"  => 's.id')                          // you have to put the identifier field without label. Do not replace the "_identifier_"
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
	
	
	public function getTableAction()
	{
	
	
		$societes = DB::table('Societe')->select('societe.id','societe.nom','societe.adresse','societe.telephone');
		#'Bllim\Datatables\Facade\Datatables
		return Datatables::of($societes)->make();
	
	
	}
	
	
public function societeajaxAction()
	{
		$result = DB::table('Societe')
		->select('societes.id as id', 'societes.nom as title', 'societe.adresse');
		
		return Datatables::of($result)
		
		#->add_column('edit', '<a href="/admin/article_edit/{{ $id }}"><i class="icon-list-alt"></i>Edit</a>')
		#->add_column('delete', '<a href="/admin/article_delete/{{ $id }}"><i class="icon-trash"></i>Delete</a>')
		->make();
	}
	
	
	public function indexAction()
	{
	    $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InterimRecruteBundle:Societe')->findAll(); 

         return $this->render('InterimRecruteBundle:Societe:index.html.twig', array(
            'entities' => $entities,
        ));                                                                // call the datatable config initializer
		                // replace "XXXMyBundle:Module:index.html.twig" by yours
	}
    /**
     * Creates a new Societe entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Societe();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('societe_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:Societe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Societe entity.
     *
     * @param Societe $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Societe $entity)
    {
        $form = $this->createForm(new SocieteType(), $entity, array(
            'action' => $this->generateUrl('societe_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Societe entity.
     *
     */
    public function newAction()
    {
        $entity = new Societe();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:Societe:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Societe entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Societe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Societe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Societe:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Societe entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Societe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Societe entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Societe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Societe entity.
    *
    * @param Societe $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Societe $entity)
    {
        $form = $this->createForm(new SocieteType(), $entity, array(
            'action' => $this->generateUrl('societe_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Societe entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Societe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Societe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('societe_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:Societe:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Societe entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:Societe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Societe entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('societe'));
    }

    /**
     * Creates a form to delete a Societe entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('societe_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
