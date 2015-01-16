<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Interim\RecruteBundle\Entity\Experience;
use Interim\RecruteBundle\Form\ExperienceType;

/**
 * Experience controller.
 *
 */
class ExperienceController extends Controller
{

    /**
     * Lists all Experience entities.
     *
     * @Secure(roles="ROLE_AGENT,ROLE_USER")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InterimRecruteBundle:Experience')->findAll();

        return $this->render('InterimRecruteBundle:Experience:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Experience entity.
     *
     * @Secure(roles="ROLE_AGENT,ROLE_USER")
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Experience();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('experience_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:Experience:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Experience entity.
     *
     * @param Experience $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Experience $entity)
    {
        $form = $this->createForm(new ExperienceType(), $entity, array(
            'action' => $this->generateUrl('experience_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Experience entity.
     *
     */
    public function newAction()
    {
        $entity = new Experience();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:Experience:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Experience entity.
     * 
     * @Secure(roles="ROLE_AGENT,ROLE_USER,ROLE_SOCIETE")
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Experience')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Experience entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Experience:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Experience entity.
     *
     * @Secure(roles="ROLE_AGENT,ROLE_USER")
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Experience')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Experience entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Experience:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Experience entity.
    *
    * @param Experience $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Experience $entity)
    {
        $form = $this->createForm(new ExperienceType(), $entity, array(
            'action' => $this->generateUrl('experience_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Experience entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Experience')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Experience entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('experience_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:Experience:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Experience entity.
     *
     *@Secure(roles="ROLE_AGENT,ROLE_USER ")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:Experience')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Experience entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('experience'));
    }

    /**
     * Creates a form to delete a Experience entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('experience_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
