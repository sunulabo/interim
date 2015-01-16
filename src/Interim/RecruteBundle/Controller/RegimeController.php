<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Interim\RecruteBundle\Entity\Regime;
use Interim\RecruteBundle\Form\RegimeType;

/**
 * Regime controller.
 *
 */
class RegimeController extends Controller
{

    /**
     * Lists all Regime entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InterimRecruteBundle:Regime')->findAll();

        return $this->render('InterimRecruteBundle:Regime:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Regime entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Regime();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regime_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:Regime:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Regime entity.
     *
     * @param Regime $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Regime $entity)
    {
        $form = $this->createForm(new RegimeType(), $entity, array(
            'action' => $this->generateUrl('regime_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Regime entity.
     *
     */
    public function newAction()
    {
        $entity = new Regime();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:Regime:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Regime entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Regime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regime entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Regime:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Regime entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Regime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regime entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Regime:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Regime entity.
    *
    * @param Regime $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Regime $entity)
    {
        $form = $this->createForm(new RegimeType(), $entity, array(
            'action' => $this->generateUrl('regime_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Regime entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Regime')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regime entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('regime_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:Regime:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Regime entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:Regime')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Regime entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regime'));
    }

    /**
     * Creates a form to delete a Regime entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('regime_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
