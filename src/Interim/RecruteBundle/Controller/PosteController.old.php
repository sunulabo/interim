<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Interim\RecruteBundle\Entity\Poste;
use Interim\RecruteBundle\Form\PosteType;

/**
 * Poste controller.
 *
 */
class PosteController extends Controller
{

    /**
     * Lists all Poste entities.  
     * role Role Admin ,societe,candidat,agent
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InterimRecruteBundle:Poste')->findAll();

        return $this->render('InterimRecruteBundle:Poste:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Poste entity. Poster une annonces 
     * role :Societe, agent,
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Poste();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('poste_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:Poste:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Poste entity.
     *
     * @param Poste $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     *)
     */
    private function createCreateForm(Poste $entity)
    {
        $form = $this->createForm(new PosteType(), $entity, array(
            'action' => $this->generateUrl('poste_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Poste entity.
     * Poster une annnonce  (role =agent ,societe
     */
    public function newAction()
    {
        $entity = new Poste();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:Poste:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Poste entity. 
     * Modifier annonces(role =societe,agent)
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Poste')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Poste entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Poste:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Poste entity.
     * (role =agent ,societe)
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Poste')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Poste entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Poste:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     *  (role =agent ,societe)
     * 
    * Creates a form to edit a Poste entity.
    *
    * @param Poste $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Poste $entity)
    {
        $form = $this->createForm(new PosteType(), $entity, array(
            'action' => $this->generateUrl('poste_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Poste entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Poste')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Poste entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('poste_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:Poste:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * 
     * (role =agent )
     * Deletes a Poste entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:Poste')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Poste entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('poste'));
    }

    /**
     * 
     *  (role =agent ,societe)
     * Creates a form to delete a Poste entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('poste_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
