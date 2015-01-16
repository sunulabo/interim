<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Interim\RecruteBundle\Entity\CentreInteret;
use Interim\RecruteBundle\Form\CentreInteretType;

/**
 * CentreInteret controller.
 *
 */
class CentreInteretController extends Controller
{

    /**
     * Lists all CentreInteret entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InterimRecruteBundle:CentreInteret')->findAll();

        return $this->render('InterimRecruteBundle:CentreInteret:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CentreInteret entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CentreInteret();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('centreinteret_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:CentreInteret:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CentreInteret entity.
     *
     * @param CentreInteret $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CentreInteret $entity)
    {
        $form = $this->createForm(new CentreInteretType(), $entity, array(
            'action' => $this->generateUrl('centreinteret_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CentreInteret entity.
     *
     */
    public function newAction()
    {
        $entity = new CentreInteret();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:CentreInteret:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CentreInteret entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:CentreInteret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CentreInteret entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:CentreInteret:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CentreInteret entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:CentreInteret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CentreInteret entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:CentreInteret:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CentreInteret entity.
    *
    * @param CentreInteret $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CentreInteret $entity)
    {
        $form = $this->createForm(new CentreInteretType(), $entity, array(
            'action' => $this->generateUrl('centreinteret_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CentreInteret entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:CentreInteret')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CentreInteret entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('centreinteret_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:CentreInteret:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CentreInteret entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:CentreInteret')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CentreInteret entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('centreinteret'));
    }

    /**
     * Creates a form to delete a CentreInteret entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('centreinteret_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
