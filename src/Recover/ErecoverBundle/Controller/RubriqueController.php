<?php

namespace Recover\ErecoverBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Recover\ErecoverBundle\Entity\Rubrique;
use Recover\ErecoverBundle\Form\RubriqueType;

/**
 * Rubrique controller.
 *
 */
class RubriqueController extends Controller
{

    /**
     * Lists all Rubrique entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RecoverErecoverBundle:Rubrique')->findAll();

        return $this->render('RecoverErecoverBundle:Rubrique:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Rubrique entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Rubrique();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('rubrique_show', array('id' => $entity->getId())));
        }

        return $this->render('RecoverErecoverBundle:Rubrique:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Rubrique entity.
     *
     * @param Rubrique $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rubrique $entity)
    {
        $form = $this->createForm(new RubriqueType(), $entity, array(
            'action' => $this->generateUrl('rubrique_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Rubrique entity.
     *
     */
    public function newAction()
    {
        $entity = new Rubrique();
        $form   = $this->createCreateForm($entity);

        return $this->render('RecoverErecoverBundle:Rubrique:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Rubrique entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Rubrique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubrique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecoverErecoverBundle:Rubrique:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rubrique entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Rubrique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubrique entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecoverErecoverBundle:Rubrique:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Rubrique entity.
    *
    * @param Rubrique $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Rubrique $entity)
    {
        $form = $this->createForm(new RubriqueType(), $entity, array(
            'action' => $this->generateUrl('rubrique_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Rubrique entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Rubrique')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rubrique entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('rubrique_edit', array('id' => $id)));
        }

        return $this->render('RecoverErecoverBundle:Rubrique:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Rubrique entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RecoverErecoverBundle:Rubrique')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rubrique entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('rubrique'));
    }

    /**
     * Creates a form to delete a Rubrique entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rubrique_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
