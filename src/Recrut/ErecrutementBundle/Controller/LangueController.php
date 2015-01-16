<?php

namespace Recrut\ErecrutementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Recrut\ErecrutementBundle\Entity\Langue;
use Recrut\ErecrutementBundle\Form\LangueType;

/**
 * Langue controller.
 *
 */
class LangueController extends Controller
{

    /**
     * Lists all Langue entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RecrutErecrutementBundle:Langue')->findAll();

        return $this->render('RecrutErecrutementBundle:Langue:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Langue entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Langue();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('langue_show', array('id' => $entity->getId())));
        }

        return $this->render('RecrutErecrutementBundle:Langue:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Langue entity.
     *
     * @param Langue $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Langue $entity)
    {
        $form = $this->createForm(new LangueType(), $entity, array(
            'action' => $this->generateUrl('langue_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Langue entity.
     *
     */
    public function newAction()
    {
        $entity = new Langue();
        $form   = $this->createCreateForm($entity);

        return $this->render('RecrutErecrutementBundle:Langue:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Langue entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Langue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Langue entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecrutErecrutementBundle:Langue:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Langue entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Langue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Langue entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecrutErecrutementBundle:Langue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Langue entity.
    *
    * @param Langue $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Langue $entity)
    {
        $form = $this->createForm(new LangueType(), $entity, array(
            'action' => $this->generateUrl('langue_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Langue entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Langue')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Langue entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('langue_edit', array('id' => $id)));
        }

        return $this->render('RecrutErecrutementBundle:Langue:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Langue entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RecrutErecrutementBundle:Langue')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Langue entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('langue'));
    }

    /**
     * Creates a form to delete a Langue entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('langue_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
