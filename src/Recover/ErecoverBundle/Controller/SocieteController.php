<?php

namespace Recover\ErecoverBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Recover\ErecoverBundle\Entity\Societe;
use Recover\ErecoverBundle\Form\SocieteType;

/**
 * Societe controller.
 *
 */
class SocieteController extends Controller
{

    /**
     * Lists all Societe entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RecoverErecoverBundle:Societe')->findAll();

        return $this->render('RecoverErecoverBundle:Societe:index.html.twig', array(
            'entities' => $entities,
        ));
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

        return $this->render('RecoverErecoverBundle:Societe:new.html.twig', array(
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

        return $this->render('RecoverErecoverBundle:Societe:new.html.twig', array(
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

        $entity = $em->getRepository('RecoverErecoverBundle:Societe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Societe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecoverErecoverBundle:Societe:show.html.twig', array(
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

        $entity = $em->getRepository('RecoverErecoverBundle:Societe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Societe entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecoverErecoverBundle:Societe:edit.html.twig', array(
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

        $entity = $em->getRepository('RecoverErecoverBundle:Societe')->find($id);

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

        return $this->render('RecoverErecoverBundle:Societe:edit.html.twig', array(
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
            $entity = $em->getRepository('RecoverErecoverBundle:Societe')->find($id);

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
