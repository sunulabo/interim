<?php

namespace Recrut\ErecrutementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Recrut\ErecrutementBundle\Entity\Critere;
use Recrut\ErecrutementBundle\Form\CritereType;

/**
 * Critere controller.
 *
 */
class CritereController extends Controller
{

    /**
     * Lists all Critere entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('RecrutErecrutementBundle:Critere')->findAll();

        return $this->render('RecrutErecrutementBundle:Critere:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Critere entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Critere();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('critere_show', array('id' => $entity->getId())));
        }

        return $this->render('RecrutErecrutementBundle:Critere:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Critere entity.
     *
     * @param Critere $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Critere $entity)
    {
        $form = $this->createForm(new CritereType(), $entity, array(
            'action' => $this->generateUrl('critere_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Critere entity.
     *
     */
    public function newAction()
    {
        $entity = new Critere();
        $form   = $this->createCreateForm($entity);

        return $this->render('RecrutErecrutementBundle:Critere:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Critere entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Critere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Critere entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecrutErecrutementBundle:Critere:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Critere entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Critere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Critere entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecrutErecrutementBundle:Critere:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Critere entity.
    *
    * @param Critere $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Critere $entity)
    {
        $form = $this->createForm(new CritereType(), $entity, array(
            'action' => $this->generateUrl('critere_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Critere entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecrutErecrutementBundle:Critere')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Critere entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('critere_edit', array('id' => $id)));
        }

        return $this->render('RecrutErecrutementBundle:Critere:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Critere entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RecrutErecrutementBundle:Critere')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Critere entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('critere'));
    }

    /**
     * Creates a form to delete a Critere entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('critere_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
