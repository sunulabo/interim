<?php

namespace Recover\ErecoverBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Recover\ErecoverBundle\Entity\Etat;
use Recover\ErecoverBundle\Form\EtatType;

/**
 * Etat controller.
 *
 */
class EtatController extends Controller
{

    /**
     * Lists all Etat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RecoverErecoverBundle:Etat')->findAll();

        return $this->render('RecoverErecoverBundle:Etat:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Etat entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Etat();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('etat_show', array('id' => $entity->getId())));
        }

        return $this->render('RecoverErecoverBundle:Etat:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Etat entity.
     *
     * @param Etat $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Etat $entity)
    {
        $form = $this->createForm(new EtatType(), $entity, array(
            'action' => $this->generateUrl('etat_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Etat entity.
     *
     */
    public function newAction()
    {
        $entity = new Etat();
        $form   = $this->createCreateForm($entity);

        return $this->render('RecoverErecoverBundle:Etat:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Etat entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Etat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecoverErecoverBundle:Etat:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Etat entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Etat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etat entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecoverErecoverBundle:Etat:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Etat entity.
    *
    * @param Etat $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Etat $entity)
    {
        $form = $this->createForm(new EtatType(), $entity, array(
            'action' => $this->generateUrl('etat_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Etat entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Etat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Etat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('etat_edit', array('id' => $id)));
        }

        return $this->render('RecoverErecoverBundle:Etat:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Etat entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RecoverErecoverBundle:Etat')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Etat entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('etat'));
    }

    /**
     * Creates a form to delete a Etat entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etat_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
