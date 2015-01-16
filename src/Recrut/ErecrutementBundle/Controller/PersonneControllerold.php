<?php

namespace Recrut\ErecrutementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Recrut\ErecrutementBundle\Entity\Personne;
use Recrut\ErecrutementBundle\Form\PersonneType;

/**
 * Personne controller.
 *
 */
class PersonneController extends Controller
{

    /**
     * Lists all Personne entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RecrutErecrutementBundle:Personne')->findAll();

        return $this->render('RecrutErecrutementBundle:Personne:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Personne entity.
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

            return $this->redirect($this->generateUrl('personne_show', array('id' => $entity->getId())));
        }

        return $this->render('RecrutErecrutementBundle:Personne:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Personne entity.
     *
     * @param Personne $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Personne $entity)
    {
        $form = $this->createForm(new PersonneType(), $entity, array(
            'action' => $this->generateUrl('personne_create'),
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

        return $this->render('RecrutErecrutementBundle:Personne:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Personne entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecrutErecrutementBundle:Personne:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Personne entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personne entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecrutErecrutementBundle:Personne:edit.html.twig', array(
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
        $form = $this->createForm(new PersonneType(), $entity, array(
            'action' => $this->generateUrl('personne_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Personne entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Personne')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Personne entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('personne_edit', array('id' => $id)));
        }

        return $this->render('RecrutErecrutementBundle:Personne:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Personne entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RecrutErecrutementBundle:Personne')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Personne entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('personne'));
    }

    /**
     * Creates a form to delete a Personne entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personne_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
