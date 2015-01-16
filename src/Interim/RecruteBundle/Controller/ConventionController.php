<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Interim\RecruteBundle\Entity\Convention;
use Interim\RecruteBundle\Form\ConventionType;

/**
 * Convention controller.
 *
 */
class ConventionController extends Controller
{

    /**
     * Lists all Convention entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InterimRecruteBundle:Convention')->findAll();

        return $this->render('InterimRecruteBundle:Convention:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Convention entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Convention();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('convention_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:Convention:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Convention entity.
     *
     * @param Convention $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Convention $entity)
    {
        $form = $this->createForm(new ConventionType(), $entity, array(
            'action' => $this->generateUrl('convention_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Convention entity.
     *
     */
    public function newAction()
    {
        $entity = new Convention();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:Convention:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Convention entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Convention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convention entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Convention:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Convention entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Convention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convention entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Convention:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Convention entity.
    *
    * @param Convention $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Convention $entity)
    {
        $form = $this->createForm(new ConventionType(), $entity, array(
            'action' => $this->generateUrl('convention_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Convention entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Convention')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Convention entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('convention_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:Convention:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Convention entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:Convention')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Convention entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('convention'));
    }

    /**
     * Creates a form to delete a Convention entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('convention_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
