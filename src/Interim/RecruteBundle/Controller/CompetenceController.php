<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Interim\RecruteBundle\Entity\Competence;
use Interim\RecruteBundle\Form\CompetenceType;

/**
 * Competence controller.
 *
 */
class CompetenceController extends Controller
{

    /**
     * Lists all Competence entities.
     *@Secure(roles="ROLE_AGENT,ROLE_USER ")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InterimRecruteBundle:Competence')->findAll();

        return $this->render('InterimRecruteBundle:Competence:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Competence entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Competence();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('competence_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:Competence:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Competence entity.
     *
     * @param Competence $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Competence $entity)
    {
        $form = $this->createForm(new CompetenceType(), $entity, array(
            'action' => $this->generateUrl('competence_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Competence entity.
     * @Secure(roles="ROLE_AGENT,ROLE_USER ")
     */
    public function newAction()
    {
        $entity = new Competence();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:Competence:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Competence entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Competence')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Competence entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Competence:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Competence entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Competence')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Competence entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Competence:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Competence entity.
    *
    * @param Competence $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Competence $entity)
    {
        $form = $this->createForm(new CompetenceType(), $entity, array(
            'action' => $this->generateUrl('competence_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Competence entity.
     * @Secure(roles="ROLE_AGENT,ROLE_USER ")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Competence')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Competence entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('competence_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:Competence:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Competence entity.
     * @Secure(roles="ROLE_AGENT,ROLE_USER ")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:Competence')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Competence entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('competence'));
    }

    /**
     * Creates a form to delete a Competence entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('competence_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
