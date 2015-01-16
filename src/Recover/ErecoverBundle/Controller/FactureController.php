<?php

namespace Recover\ErecoverBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Recover\ErecoverBundle\Entity\Facture;
use Recover\ErecoverBundle\Form\FactureType;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * Facture controller.
 *
 */
class FactureController extends Controller
{

    /**
     * Lists all Facture entities.
     *
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();

        #$entities = $em->getRepository('RecoverErecoverBundle:Facture')->findAll();
        if($this->get('security.context')->isGranted('ROLE_ADMIN')||$this->get('security.context')->isGranted('ROLE_AGENT') )
        {
        	$entities =$em->getRepository('RecoverErecoverBundle:Facture')->getFactures(3,$page);
        }
        else if($this->get('security.context')->isGranted('ROLE_SOCIETE'))
        {
        	
        	$users = $this->getUser();
        	if (null!= $users)
        	{
        	$societe = $em->getRepository('RecoverErecoverBundle:Societe')->findByUser($users);
        	$entities =$em->getRepository('RecoverErecoverBundle:Facture')->getFacturesBySociete(3,$page,$societe);
        	}
        	
        	
        	
        }
    else 
    	
        	{
        		new \Exception('Utilisateur incorrect Bizarrre');
        	}
        #else 
        #	$entities =$em->getRepository('RecoverErecoverBundle:Facture')->getFactures(3,$page);

        return $this->render('RecoverErecoverBundle:Facture:index.html.twig', array(
            'entities' => $entities,
        	'page' => $page,
        	'nombrePage' => ceil(count($entities)/3),
        ));
    }
    /**
     * Creates a new Facture
    * 
    **/
    
    public function createAction(Request $request)
    {
       
    	
    	
    	
    	$entity = new Facture();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
        	// on traitte manuellement le fichier uploader
        	// on boucle sur les images
        	/*  foreach ($entity->getImages() as $image)
        	{
        	$image->upload();
        	$image->setFacture($entity);
        	}  */
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('facture_show', array('id' => $entity->getId())));
        }

        return $this->render('RecoverErecoverBundle:Facture:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Facture entity.
     *
     * @param Facture $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Facture $entity)
    {
        $form = $this->createForm(new FactureType(), $entity, array(
            'action' => $this->generateUrl('facture_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Facture entity.
     *
     */
    
     // @Secure(roles="ROLE_ADMIN")
     
    public function newAction()
    {
    	/*  if(!$this->get('security.context')->isGranted('ROLE_ADMIN'))
    	 {
    	throw new AccessDeniedHttpException('Acces limiter aux administrateurs !!!');
    	}   */
    	$entity = new Facture();
        $form   = $this->createCreateForm($entity);

        return $this->render('RecoverErecoverBundle:Facture:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Facture entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Facture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facture entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecoverErecoverBundle:Facture:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Facture entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Facture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facture entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('RecoverErecoverBundle:Facture:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Facture entity.
    *
    * @param Facture $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Facture $entity)
    {
        $form = $this->createForm(new FactureType(), $entity, array(
            'action' => $this->generateUrl('facture_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Facture entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('RecoverErecoverBundle:Facture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facture entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('facture_edit', array('id' => $id)));
        }

        return $this->render('RecoverErecoverBundle:Facture:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Facture entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('RecoverErecoverBundle:Facture')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Facture entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('facture'));
    }

    /**
     * Creates a form to delete a Facture entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('facture_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
